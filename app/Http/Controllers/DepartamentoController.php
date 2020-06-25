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

//En index se obtiene el listado completo de departamentos y se paginan de 10. Se va hacia la vista de blade

    public function json()
    {
        return Departamento::all();
    }

    public function index()
    {
      $departamentos = Departamento::latest()->paginate(10);
      $facultades = Facultad::all();
      return view('departamentos.index',compact('departamentos'),['facultades' => $facultades])
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function indexelim()
    {
      $departamentos = Departamento::onlyTrashed()->latest()->paginate(10);
      $facultades = Facultad::all();
      return view('departamentos.index',compact('departamentos'),['facultades' => $facultades])
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
        'id' => ['required','integer','unique:departamentos'],
        'Nombre' => ['required','unique:departamentos'],
        'CodigoFacultad' => ['required','integer'],
      ]);
      Departamento::create($request->all());
      if ($request['deleted_at'] == "Inactivo"){
        Departamento::destroy($request['id']);
      }
      return redirect()->route('departamentos.index')
        ->with('success','Departamento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */

    public function show(Departamento $departamento)
    {
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
      if ($request['deleted_at'] == "Inactivo"){
        Departamento::destroy($id);
      }
      return redirect()->route('departamentos.index')
        ->with('success','Departamento Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\departamento  $departamento
     * @return \Illuminate\Http\Response
     */

//funcion para eliminar un registro conociendo su id
    public function destroy($id)
    {
      $departamento = departamento::find($id);
      $departamento->delete();
      return redirect()->route('departamentos.index')
        ->with('success','Departamento Eliminado Exitosamente');
    }

//funcion para reactivar un registro eliminado, utilizando restore()
    public function reactivar($id)
    {
      $departamento = departamento::onlyTrashed()->find($id);
      $departamento->restore();
      return redirect()->route('departamentos.index')
        ->with('success','Departamento Reactivado Exitosamente');
    }
}
