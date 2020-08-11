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
      $procesos = Proceso::all();
      $activo = Proceso::where('Estado', '=', 'Activo')->first();
      $fecha = date("Y-m-d");
      $año = date("Y");
      $fin = $año.'-12-31';
      return view('procesos.index',compact('procesos','activo','fecha','fin'));
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
    public function update(Request $request, $año)
    {
      $request->validate([
        'inicio' => 'required',
        'fin' => 'required|date|after:inicio',
      ]);
      $proceso = Proceso::find($año);
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

    public function abrir($año)
    {
      $proceso = proceso::all()->find($año);
      $añoActual = date("Y");
      $proceso->inicio= date("Y-m-d");
      $proceso->fin=$añoActual.'/12/31';
      $proceso->update();
      return redirect()->route('procesos.index')
        ->with('success','Proceso Abierto');
    }

    public function cerrar($año)
    {
      $proceso = proceso::all()->find($año);
      $ant = date("d")-1;
      $actual = date("Y-m");
      $proceso->inicio=$actual.'-'.$ant;
      $proceso->fin=$actual.'-'.$ant;
      $proceso->update();
      return redirect()->route('procesos.index')
        ->with('success','Proceso Cerrado');
    }

    public function cambiar(Request $request)
    {
      $elegido = proceso::find($request['año']);
      if ($elegido->Estado == "Inactivo"){
        $procesos = proceso::all();
        foreach ($procesos as $proceso){
          if($proceso->Estado == 'Activo'){
              $proceso->Estado = "Inactivo";
              $proceso->save();
          }
        }
        $elegido->Estado = "Activo";
        $elegido->save();
      }
      return redirect()->route('procesos.index')
        ->with('success','Proceso activado');
    }
}
