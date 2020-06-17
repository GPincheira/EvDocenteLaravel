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
public function index()
{

      return Evaluacion::all();
    



/** Probar algo asi
    return Modelo::select('id', 'name')
                   ->orderBy('id', 'desc')
                   ->get(); */
    //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
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

      public function store(Request $request)
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

     public function show(Request $request)
    {
        $evaluacion = Evaluacion::findOrFail($request->id);
        return $evaluacion;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
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
    public function update(Request $request)
    {
      $evaluacion = Evaluacion::findOrFail($request->$id);
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
    public function destroy(Request $request)
    {
      $evaluacion = Evaluacion::destroy($request->id);
      return $evaluacion;
    }

//funcion para reactivar un elemento ya eliminado
    public function reactivar($id)
    {
      $evaluacion = evaluacion::onlyTrashed()->find($id);
      $evaluacion->restore();
      return redirect()->route('evaluaciones.index')
        ->with('success','Evaluacion Reactivada Exitosamente');
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
