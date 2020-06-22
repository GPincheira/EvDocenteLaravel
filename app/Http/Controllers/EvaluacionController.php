<?php

namespace App\Http\Controllers;

use App\evaluacion;
use App\academico;
use App\facultad;
use App\comision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\EvaluacionesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//En index se obtiene el listado completo de evaluaciones realizadas y se paginan de 10.
// Se va hacia la vista de blade, de manera diferente dependiendo del rol de usuario
    public function json()
    {
        return Evaluacion::all();
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function evaluar(){
        return view('evaluaciones.evaluar');
    }

    public function index()
    {
      $evaluaciones = Evaluacion::latest()->paginate(10);
      if(@Auth::user()->hasRole('SecFacultad')){
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $comisiones = Facultad::find($CodigoFacultad)->comisiones;
        return view('evaluaciones.index',compact('evaluaciones'),['comisiones' => $comisiones])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        return view('evaluaciones.index',compact('evaluaciones'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

//index para los elementos eliminados
    public function indexelim()
    {
      $evaluaciones = Evaluacion::onlyTrashed()->latest()->paginate(10);
      if(@Auth::user()->hasRole('SecFacultad')){
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $comisiones = Facultad::find($CodigoFacultad)->comisiones;
        return view('evaluaciones.index',compact('evaluaciones'),['comisiones' => $comisiones])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        return view('evaluaciones.index',compact('evaluaciones'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

//funcion index2, para utilizarse como vista para el usuario secretario
    public function index2()
    {
      $evaluaciones = Evaluacion::latest()->paginate(10);
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

public function show($id)
{
     $evaluacion = evaluacion::withTrashed()->find($id);
     return view('evaluaciones.show',compact('evaluacion'));
}

public function edit($id)
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
          $evaluacion = new Evaluacion();
          $evaluacion->RUTAcademico = $request->RUTAcademico;
          $evaluacion->CodigoComision = $request->CodigoComision;
          $evaluacion->año = $request->año;
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
          //Esta función guardará las tareas que enviaremos mediante vuejs
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
      return $evaluacion;
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

//funcion para generar un archivo excel, llamado "evaluacion"
    public function export()
    {
      return Excel::download(new EvaluacionesExport, 'evaluacion.xlsx');
    }

//funcion para generar un archivo pdf para cada evaluacion que se realiza
    public function pdf($id)
    {
        $evaluacion = evaluacion::find($id);
        $pdf = PDF::loadView('pdf.evaluaciones', compact('evaluacion'));
        return $pdf->download('evaluacion.pdf');
    }

}
