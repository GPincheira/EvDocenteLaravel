<?php

namespace App\Http\Controllers;

use App\departamento;
use App\facultad;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departamentos = Departamento::latest()->paginate(10);
      return view('departamentos.index',compact('departamentos'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function indexelim()
    {
      $departamentos = Departamento::onlyTrashed()->latest()->paginate(10);
      return view('departamentos.index',compact('departamentos'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultades = Facultad::all();
        return view('departamentos.create',['facultades' => $facultades]);
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
        'id' => ['required','integer'],
        'Nombre' => 'required',
        'CodigoFacultad' => ['required','integer'],
      ]);
      Departamento::create($request->all());
      return redirect()->route('departamentos.index')
        ->with('success','Departamento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $departamento = departamento::find($id);
      return view('departamentos.show',compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $departamento = departamento::find($id);
      $facultades = Facultad::all();
      return view('departamentos.edit',compact('departamento'),['facultades' => $facultades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'id' => ['required','integer'],
        'Nombre' => 'required',
        'CodigoFacultad' => ['required','integer'],
      ]);
      $departamento = departamento::find($id);
      $departamento->update($request->all());
      return redirect()->route('departamentos.index')
        ->with('success','Departamento Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $departamento = departamento::find($id);
      $departamento->delete();
      return redirect()->route('departamentos.index')
        ->with('success','Departamento Eliminado Exitosamente');
    }

    public function reactivar($id)
    {
      $departamento = departamento::onlyTrashed()->find($id);
      $departamento->restore();
      return redirect()->route('departamentos.index')
        ->with('success','Departamento Reactivado Exitosamente');
    }
}
