<?php

namespace App\Http\Controllers;

use App\evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $evaluaciones = Evaluacion::latest()->paginate(10);
      return view('evaluaciones.index',compact('evaluaciones'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evaluaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'CodigoComision' => 'required',
        'RUTAcademico' => 'required',
        'Argumento' => 'required',
        'n1' => 'required',
        'n2' => 'required',
        'n3' => 'required',
        'n4' => 'required',
        'n5' => 'required',
        'p1' => 'required',
        'p2' => 'required',
        'p3' => 'required',
        'p4' => 'required',
        'p5' => 'required',
        'NotaFinal' => 'required',
      ]);
      Evaluacion::create($request->all());
      return redirect()->route('evaluaciones.index')
        ->with('success','Evaluacion creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $evaluacion = evaluacion::find($id);
      return view('evaluaciones.show',compact('evaluacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, $id)
    {
      $request->validate([
        'CodigoComision' => 'required',
        'RUTAcademico' => 'required',
        'Argumento' => 'required',
        'n1' => 'required',
        'n2' => 'required',
        'n3' => 'required',
        'n4' => 'required',
        'n5' => 'required',
        'p1' => 'required',
        'p2' => 'required',
        'p3' => 'required',
        'p4' => 'required',
        'p5' => 'required',
        'NotaFinal' => 'required',
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
}
