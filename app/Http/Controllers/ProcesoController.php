<?php

namespace App\Http\Controllers;

use App\Proceso;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{

    public function index()
    {
      $procesos = Proceso::all();
      $activo = Proceso::where('Estado', '=', 'Activo')->first();
      $fecha = date("Y-m-d");
      $año = date("Y");
      $fin = $año.'-12-31';
      return view('procesos.index',compact('procesos','activo','fecha','fin'));
    }

    public function create()
    {
        return view('procesos.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Proceso $proceso)
    {
        //
    }

    public function edit(Proceso $proceso)
    {
        //
    }

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
