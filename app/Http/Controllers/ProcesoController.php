<?php

namespace App\Http\Controllers;

use App\Proceso;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $proceso = Proceso::first();
      $fecha = date("Y-m-d");
      $año = date("Y");
      $fin = $año.'-12-31';
      return view('procesos.index',compact('proceso','fecha','fin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('procesos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function show(Proceso $proceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function edit(Proceso $proceso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'inicio' => 'required',
        'fin' => 'required|date|after:inicio',
      ]);
      $proceso = Proceso::find($id);
      $proceso->update($request->all());
      return redirect()->route('procesos.index')
        ->with('success','Proceso de Evaluacion Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proceso $proceso)
    {
        //
    }

    public function abrir($id)
    {
      $proceso = proceso::all()->find($id);
      $añoActual = date("Y");
      $proceso->inicio= date("Y-m-d");
      $proceso->fin=$añoActual.'/12/31';
      $proceso->update();
      return redirect()->route('procesos.index')
        ->with('success','Proceso Abierto');
    }

    public function cerrar($id)
    {
      $proceso = proceso::all()->find($id);
      $ant = date("d")-1;
      $actual = date("Y-m");
      $proceso->inicio=$actual.'-'.$ant;
      $proceso->fin=$actual.'-'.$ant;
      $proceso->update();
      return redirect()->route('procesos.index')
        ->with('success','Proceso Cerrado');
    }
}
