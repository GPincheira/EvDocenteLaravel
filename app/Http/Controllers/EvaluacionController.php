<?php

namespace App\Http\Controllers;

use App\evaluacion;
use App\academico;
use App\facultad;
use App\comision;
use App\Proceso;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\EvaluacionesExport;
use App\Exports\HistorialExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class EvaluacionController extends Controller
{

//funcion que pone todos los dptos en un formato json
    public function json()
    {
        return Evaluacion::all();
    }

//En index se obtiene el listado completo de evaluaciones para el año activo si es sec de facultad o todas si es Administrador
//y se paginan de 10. Al sec de facultad se le entrega tambien un listado de academicos aun no evaluados en el periodo activo
    public function index()
    {
      if(@Auth::user()->hasRole('Administrador')){
        $evaluaciones = Evaluacion::orderBy('año','DESC')->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else if(@Auth::user()->hasRole('SecFacultad')){
        $proceso = proceso::where('Estado', 'Activo')->first(); //periodo activo
        $academicos = DB::table('academicos') //academicos que no presentan evaluacion en el año activo
            	       ->select('academicos.id','academicos.verificador','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                              'departamentos.Nombre','academicos.TituloProfesional','academicos.CodigoDpto')
                      ->leftJoin('departamentos', function($join){
                           $join->on('academicos.CodigoDpto', '=', 'departamentos.id');
                            })
                      ->leftJoin('evaluaciones', function($join){
                           $Periodoactivo = Proceso::select('año')->where('Estado', 'Activo')->first();
                           $join->on('academicos.id', '=', 'evaluaciones.RUTAcademico')
                           ->where('evaluaciones.año', '=', $Periodoactivo->año)
                           ->where('evaluaciones.deleted_at', NULL);
                            })
                      ->whereNull('evaluaciones.RUTAcademico')
                      ->where('academicos.CodigoFacultad', '=', @Auth::user()->secFacultad->CodigoFacultad)
                      ->orderBy('academicos.ApellidoPaterno')
                      ->get();
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $evaluaciones = Evaluacion::where('CodigoFacultad',$CodigoFacultad) //listado de evaluaciones en el año activo
                      ->where('año', $proceso->año)->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'),['academicos'=>$academicos, 'año'=>$proceso->año])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        $evaluaciones = Evaluacion::orderBy('RUTAcademico')->where('Año',date("Y"))->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

//index para las que han sido eliminadas, solo del año activo si es sec de facultad
    public function indexelim()
    {
      $proceso = proceso::where('Estado', 'Activo')->first();
      if (@Auth::user()->hasRole('Administrador')){
        $evaluaciones = Evaluacion::orderBy('año')->onlyTrashed()->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'),['año'=>$proceso->año])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $evaluaciones = Evaluacion::orderBy('RUTAcademico')->onlyTrashed()
                    ->where('CodigoFacultad',$CodigoFacultad)
                    ->where('evaluaciones.año', '=', $proceso->año)
                    ->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'),['año'=>$proceso->año])
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

//funcion index2, para utilizarse como vista para el usuario secretario con evaluaciones con excelencia
    public function index2()
    {
      $evaluaciones = Evaluacion::orderBy('año','DESC')->where('NotaFinal','>=','4.5')->latest()->paginate(10);
      return view('evaluaciones.index2',compact('evaluaciones'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

//funcion para vista de evaluacion, recibe el periodo actual, datos sobre el academico y su ultima evaluacion
    public function evaluar($id){
      $proceso = proceso::where('Estado', 'Activo')->first();
      $año = $proceso->año;
      $academico = Academico::find($id);
      $ultima = Evaluacion::orderBy('año', 'DESC')  //dato de la ultima evaluacion de este academico
                ->where('RUTAcademico', $id)
                ->where('año', '<', $proceso->año)
                ->first();
      $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
      $academicos = Academico::all()->where('CodigoFacultad',$CodigoFacultad);
      $evaluaciones = Evaluacion::where('CodigoFacultad',$CodigoFacultad)->where('año', '=', $proceso->año)->latest()->paginate(10);
      $academico = Academico::find($id);
      $comision = Comision::where('Estado', '=', 'Activo')  //datos de la comision activa
                ->where('Año', '=', $proceso->año)
                ->where('CodigoFacultad', '=', @Auth::user()->secFacultad->CodigoFacultad)
                ->first();
      $evaluado = Evaluacion::where('RUTAcademico',$id)->where('Año', $proceso->año)->first();  //datos del academico
      if ($proceso->inicio<=date('Y-m-d') && $proceso->fin>=date('Y-m-d')){
        if ($comision != null){
          if ($evaluado != null) {  //si ya hay evaluacion para este academico, se avisa con un mensaje
            return redirect()->route('evaluaciones.index')
              ->with('success','Academico evaluado');
          }
          else{   //se envia a la vista para evaluar
            return view('evaluaciones.evaluar',compact('proceso','academico','ultima','año'));
          }
        }
        else{ //si no hay una comision creada para el año, se envia mensaje de error
            return Redirect()->back()->with('error','No existe una comision activa');
        }
      }
      else{
        return Redirect()->back()->with('error','Fuera de periodo de evaluacion');
      }
    }

//funcion que almacena en la BD lo ingresado en el formulario, ademas del id del academico, comision y año
    public function store2(Request $request)
    {
        $proceso = proceso::where('Estado', 'Activo')->first();
        $comision = Comision::where('Estado', '=', 'Activo')
                ->where('Año', '=', $proceso->año)
                ->where('CodigoFacultad', '=', @Auth::user()->secFacultad->CodigoFacultad)
                ->first();
        $evaluacion = new Evaluacion();
        $evaluacion->RUTAcademico = $request->RUTAcademico;
        $evaluacion->CodigoComision = $comision->id;
        $evaluacion->CodigoFacultad = $comision->CodigoFacultad;
        $evaluacion->año = $proceso->año;
        $evaluacion->p1 = $request->p1;
        $evaluacion->n1 = $request->n1;
        $evaluacion->p2 = $request->p2;
        $evaluacion->n2 = $request->n2;
        $evaluacion->p3 = $request->p3;
        $evaluacion->n3 = $request->n3;
        $evaluacion->p4 = $request->p4;
        $evaluacion->n4 = $request->n4;
        $evaluacion->p5 = $request->p5;
        $evaluacion->n5 = $request->n5;
        $evaluacion->Argumento = $request->Argumento;
        $evaluacion->NotaFinal = $request->NotaFinal;
        $evaluacion->save();
    }

//funcion que muestra informacion de una evaluacion en especifico
    public function show(Evaluacion $evaluacion)
    {
      $fecha = new Carbon($evaluacion->comision->Fecha);  //la fecha se pone en formato dd-mm-aaaa
      $evaluacion->comision->Fecha = $fecha->format('d-m-Y');
      $ultima = Evaluacion::orderBy('año', 'DESC')    //se debe pasar la ultima evaluacion de este academico
                ->where('RUTAcademico', $evaluacion->RUTAcademico)
                ->where('año', '<', $evaluacion->año)
                ->first();
      return view('evaluaciones.show',compact('evaluacion','ultima'));
    }

//funcion que lleva a la vista para editar una evaluacion, se pasa su informacion
    public function edit($id)
    {
      $evaluacion = evaluacion::find($id);
      $ultima = Evaluacion::orderBy('año', 'DESC')
                ->where('RUTAcademico', $id)
                ->where('año', '<', date("Y"))
                ->first();
      return view('evaluaciones.edit',compact('evaluacion','ultima'));
    }

//funcion update valida los datos ingresados para actualizar, y realiza los cambios si todo esta en orden
    public function update2(Request $request)
    {
      $evaluacion = Evaluacion::findOrFail($request->id);
      $evaluacion->p1 = $request->p1;
      $evaluacion->n1 = $request->n1;
      $evaluacion->p2 = $request->p2;
      $evaluacion->n2 = $request->n2;
      $evaluacion->p3 = $request->p3;
      $evaluacion->n3 = $request->n3;
      $evaluacion->p4 = $request->p4;
      $evaluacion->n4 = $request->n4;
      $evaluacion->p5 = $request->p5;
      $evaluacion->n5 = $request->n5;
      $evaluacion->Argumento = $request->Argumento;
      $evaluacion->NotaFinal = $request->NotaFinal;
      $evaluacion->save();
      return redirect()->route('evaluaciones.index')
        ->with('success','Evaluacion editada.');
    }

//Funcion show que se utiliza para hacer busqueda dentro de vue
    public function show2(Request $request)
   {
       $evaluacion = Evaluacion::findOrFail($request->id);
       return $evaluacion;
   }

//funcion para eliminar evaluacion
    public function destroy($id)
    {
      $evaluacion = evaluacion::find($id);
      $evaluacion->delete();
      return redirect()->route('evaluaciones.index')
        ->with('success','Evaluacion Eliminada Exitosamente');
    }

//funcion para reactivar un elemento ya eliminado
    public function reactivar($id)
    {
      $evaluacion = evaluacion::onlyTrashed()->find($id);
      $evaluacion->restore();
      return redirect()->route('evaluaciones.index')
        ->with('success','Evaluacion Reactivada Exitosamente');
    }

//funcion para generar excel sobre una evaluacion
    public function exportAcademico($id)
    {
      $evaluacion = Evaluacion::find($id);
      $evs = Evaluacion::where('RUTAcademico', $evaluacion->RUTAcademico)->get(['año','p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal','Argumento']);
      return Excel::download(new HistorialExport($evs, $evaluacion->academico->Nombres, $evaluacion->academico->ApellidoPaterno, $evaluacion->academico->ApellidoMaterno),
          'Historial_'.$evaluacion->RUTAcademico.'.xlsx');
    }

//funcion para generar un archivo pdf para cada evaluacion que se realiza
    public function pdf($id)
    {
        $evaluacion = evaluacion::find($id);
        $fecha = new Carbon($evaluacion->comision->Fecha);
        $evaluacion->comision->Fecha = $fecha->format('d-m-Y');
        $ultima = Evaluacion::orderBy('año', 'DESC')
                  ->where('RUTAcademico', $evaluacion->RUTAcademico)
                  ->where('año', '<', $evaluacion->año)
                  ->first();
        $pdf = PDF::loadView('pdf.evaluaciones',compact('evaluacion','ultima'));
        return $pdf->download('Evaluacion_'.$evaluacion->año.'-'.$evaluacion->RUTAcademico.'.pdf');
    }

}
