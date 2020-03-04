<?php

namespace App\Http\Controllers;

use App\comision;
use Illuminate\Http\Request;

class ComisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comisiones = Comision::latest()->paginate(10);
      return view('comisiones.index',compact('comisiones'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comisiones.create');
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
        'Año' => 'required',
        'Fecha' => 'required',
        'CodigoFacultad' => 'required',
        'NombreDecano' => 'required',
        'idSecFacultad' => 'required',
        'NombreSecFacultad' => 'required',
        'Nombre1' => 'required',
        'Nombre2' => 'required',
      ]);
      Comision::create($request->all());
      return redirect()->route('comisiones.index')
        ->with('success','Comision creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $comision = comision::find($id);
      return view('comisiones.show',compact('comision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comision = comision::find($id);
      return view('comisiones.edit',compact('comision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'Año' => 'required',
        'Fecha' => 'required',
        'CodigoFacultad' => 'required',
        'NombreDecano' => 'required',
        'idSecFacultad' => 'required',
        'NombreSecFacultad' => 'required',
        'Nombre1' => 'required',
        'Nombre2' => 'required',
      ]);
      $comision = comision::find($id);
      $comision->update($request->all());
      return redirect()->route('comisiones.index')
        ->with('success','Comision Actualizada Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comision = comision::find($id);
      $comision->delete();
      return redirect()->route('comisiones.index')
        ->with('success','Comision Eliminada Exitosamente');
    }
}
