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

class EvaluacionController extends Controller
{

    public function index()
    {
      if(@Auth::user()->hasRole('Administrador')){
        $evaluaciones = Evaluacion::latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else if(@Auth::user()->hasRole('SecFacultad')){
        $academicos = DB::table('academicos')
            	       ->select('academicos.id','academicos.verificador','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                              'departamentos.Nombre','academicos.TituloProfesional')
                      ->leftJoin('departamentos', function($join){
                           $join->on('academicos.CodigoDpto', '=', 'departamentos.id');
                            })
                      ->leftJoin('evaluaciones', function($join){
                           $join->on('academicos.id', '=', 'evaluaciones.RUTAcademico')
                           ->where('evaluaciones.año', '=', date("Y"))
                           ->where('evaluaciones.deleted_at', NULL);
                            })
                      ->whereNull('evaluaciones.RUTAcademico')
                      ->where('academicos.CodigoFacultad', '=', @Auth::user()->secFacultad->CodigoFacultad)
                      ->orderBy('academicos.ApellidoPaterno')
                      ->get();
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $evaluaciones = Evaluacion::where('CodigoFacultad',$CodigoFacultad)->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'),['academicos'=>$academicos])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        $evaluaciones = Evaluacion::where('Año',date("Y"))->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

//index para los elementos eliminados
    public function indexelim()
    {
      if (@Auth::user()->hasRole('Administrador')){
        $evaluaciones = Evaluacion::onlyTrashed()->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $evaluaciones = Evaluacion::onlyTrashed()->where('CodigoFacultad',$CodigoFacultad)->latest()->paginate(10);
        return view('evaluaciones.index',compact('evaluaciones'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

//funcion index2, para utilizarse como vista para el usuario secretario
    public function index2()
    {
      $evaluaciones = Evaluacion::where('NotaFinal','>=','4.5')->latest()->paginate(10);
      return view('evaluaciones.index2',compact('evaluaciones'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  //funcion store, valida los datos que fueron ingresados en blade, y si esta todo en orden procede

  public function create()
  {
      $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
      $academicos = Academico::all();
      $comisiones = Comision::all();
      $departamentos = Facultad::find($CodigoFacultad)->departamentos;
      return view('evaluaciones.create',['academicos' => $academicos , 'departamentos' => $departamentos , 'comisiones' => $comisiones]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

//funcion store, valida los datos que fueron ingresados en blade, y si esta todo en orden procede
  public function store(Request $request)
  {
    $request->validate([
      'CodigoComision' => ['required','integer'],
      'RUTAcademico' => ['required','integer','min:1000000','max:25000000'],
      'Argumento' => ['required','max:100'],
      'p1' => ['integer','min:0','max:100'],
      'n1' => ['numeric','min:0','max:5'],
      'p2' => ['integer','min:0','max:100'],
      'n2' => ['numeric','min:0','max:5'],
      'p3' => ['integer','min:0','max:100'],
      'n3' => ['numeric','min:0','max:5'],
      'p4' => ['integer','min:0','max:100'],
      'n4' => ['numeric','min:0','max:5'],
      'p5' => ['integer','min:0','max:100'],
      'n5' => ['numeric','min:0','max:5'],
    ]);
    $comisiones = Comision::all();
    $comision = Comision::find($request['CodigoComision']);
    $request['año']=$comision->Año;     //tambien se le pasan otros parametros correspondientes a la comision
    $evaluaciones = Evaluacion::all();

    //se revisa que no exista ya una evaluacion para el academico elegido en el año en curso
    foreach ($evaluaciones as $evaluacion){   //si ya existe, se vuelve atras y no se crea el registro
      if($evaluacion->año == $request['año'] && $evaluacion->RUTAcademico == $request['RUTAcademico']){
        return Redirect()->back()->with(['message' => 'Ya existe una evaluacion en este año para este academico']);
        }

    //luego se comprueba que las ponderaciones sumen 100%, si se cumple se guarda el registro
    }
    if($request['p1']+$request['p2']+$request['p3']+$request['p4']+$request['p5'] == 100){
      $request['NotaFinal']=($request['n1']*$request['p1']+$request['n2']*$request['p2']+$request['n3']*$request['p3']+$request['n4']*$request['p4']+$request['n5']*$request['p5'])/100;
      Evaluacion::create($request->all());
      return redirect()->route('evaluaciones.index')
        ->with('success','Evaluacion creada exitosamente.');
    }
    else{   //si no se cumple, se vuelve atras entregando un mensaje, y no se guarda el registro
    return Redirect()->back()->with(['message' => 'La suma de los porcentajes debe ser 100']);
  }
}

public function show(Evaluacion $evaluacion)
{
  $ultima = Evaluacion::orderBy('año', 'DESC')
            ->where('RUTAcademico', $evaluacion->RUTAcademico)
            ->where('año', '<', $evaluacion->año)
            ->first();
  return view('evaluaciones.show',compact('evaluacion','ultima'));
}

public function edit($id)
{
  $evaluacion = evaluacion::find($id);
  $ultima = Evaluacion::orderBy('año', 'DESC')
            ->where('RUTAcademico', $id)
            ->where('año', '<', date("Y"))
            ->first();
  return view('evaluaciones.edit',compact('evaluacion','ultima'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\evaluacion  $evaluacion
 * @return \Illuminate\Http\Response
 */

//funcion update valida los datos ingresados, y realiza los cambios si todo esta en orden
public function update(Request $request, $id)
{
  $request->validate([
    'Argumento' => ['required','max:100'],
    'p1' => ['integer','min:0','max:100'],
    'n1' => ['numeric','min:1','max:5'],
    'p2' => ['integer','min:0','max:100'],
    'n2' => ['numeric','min:1','max:5'],
    'p3' => ['integer','min:0','max:100'],
    'n3' => ['numeric','min:1','max:5'],
    'p4' => ['integer','min:0','max:100'],
    'n4' => ['numeric','min:1','max:5'],
    'p5' => ['integer','min:0','max:100'],
    'n5' => ['numeric','min:1','max:5'],
  ]);
  $evaluacion = evaluacion::find($id);
  $evaluacion->update($request->all());
  return redirect()->route('evaluaciones.index')
    ->with('success','Evaluacion Actualizada Exitosamente');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\evaluacion  $evaluacion
 * @return \Illuminate\Http\Response
 */
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











      public function store2(Request $request)
      {
          $comision = Comision::where('Estado', '=', 'Activo')
                  ->where('Año', '=', date("Y"))
                  ->where('CodigoFacultad', '=', @Auth::user()->secFacultad->CodigoFacultad)
                  ->first();
          $evaluacion = new Evaluacion();
          $evaluacion->RUTAcademico = $request->RUTAcademico;
          $evaluacion->CodigoComision = $comision->id;
          $evaluacion->CodigoFacultad = $comision->CodigoFacultad;
          $evaluacion->año = date("Y");
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */

     public function show2(Request $request)
    {
        $evaluacion = Evaluacion::findOrFail($request->id);
        return $evaluacion;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function edit2($id)
    {
      $evaluacion = evaluacion::find($id);
      return view('evaluaciones.edit',compact('evaluacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */

//funcion update valida los datos ingresados, y realiza los cambios si todo esta en orden
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy2(Request $request)
    {
      $evaluacion = Evaluacion::destroy($request->id);
      return $evaluacion;
    }

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
        $ultima = Evaluacion::orderBy('año', 'DESC')
                  ->where('RUTAcademico', $evaluacion->RUTAcademico)
                  ->where('año', '<', $evaluacion->año)
                  ->first();
        $pdf = PDF::loadView('pdf.evaluaciones',compact('evaluacion','ultima'));
        return $pdf->download('Evaluacion_'.$evaluacion->año.'-'.$evaluacion->RUTAcademico.'.pdf');
    }


    public function json()
    {
        return Evaluacion::all();
    }

    public function evaluar($id){

/*      $academicos = Academico::with('evaluaciones')->whereHas('evaluaciones', function($q){
        $q->where('año', '!=', date("Y"));
        })->ordoesntHave('evaluaciones')
        ->where('academicos.CodigoFacultad',@Auth::user()->secFacultad->CodigoFacultad)
        ->get(); */
  //    $academico = Academico::find($id);
      $academico = Academico::find($id);
      $ultima = Evaluacion::orderBy('año', 'DESC')
                ->where('RUTAcademico', $id)
                ->where('año', '<', date("Y"))
                ->first();
      $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
      $academicos = Academico::all()->where('CodigoFacultad',$CodigoFacultad);
      $evaluaciones = Evaluacion::where('CodigoFacultad',$CodigoFacultad)->latest()->paginate(10);
      $academico = Academico::find($id);
      $proceso = Proceso::first();
      $comision = Comision::where('Estado', '=', 'Activo')
                ->where('Año', '=', date("Y"))
                ->where('CodigoFacultad', '=', @Auth::user()->secFacultad->CodigoFacultad)
                ->first();
      $evaluado = Evaluacion::where('RUTAcademico',$id)->where('Año', date("Y"))->first();
      if ($proceso->inicio<=date('Y-m-d') && $proceso->fin>=date('Y-m-d')){
        if ($comision != null){
          if ($evaluado != null) {
            return redirect()->route('evaluaciones.index')
              ->with('success','Academico evaluado');
          }
          else{
            return view('evaluaciones.evaluar',compact('proceso','academico','ultima'));
          }
        }
        else{
            return Redirect()->back()->with('error','No existe una comision activa');
        }
      }
      else{
        return Redirect()->back()->with('error','Fuera de periodo de evaluacion');
      }
    }








}
