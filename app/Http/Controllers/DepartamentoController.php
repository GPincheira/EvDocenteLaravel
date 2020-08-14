<?php

namespace App\Http\Controllers;

use App\departamento;
use App\facultad;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{

//funcion que pone todos los dptos en un formato json
    public function json()
    {
        return Departamento::all();
    }

//En index se obtiene el listado completo de departamentos y se paginan de 10. Se va hacia la vista de blade
    public function index()
    {
      $departamentos = Departamento::orderBy('id', 'ASC')->latest()->paginate(10);
      $facultades = Facultad::all();
      return view('departamentos.index',compact('departamentos'),['facultades' => $facultades])
        ->with('i',(request()->input('page',1)-1)*5);
    }

//mismo caso anterior, pero esta vez para dptos ya eliminados
    public function indexelim()
    {
      $departamentos = Departamento::orderBy('id', 'ASC')->onlyTrashed()->latest()->paginate(10);
      $facultades = Facultad::all();
      return view('departamentos.index',compact('departamentos'),['facultades' => $facultades])
        ->with('i',(request()->input('page',1)-1)*5);
    }

//funcion crear, que luego lleva a la vista para la creacion
    public function create()
    {
        $facultades = Facultad::all();
        return view('departamentos.create',['facultades' => $facultades]);
    }

//funcion para validar los datos ingresados para la comision, y si esta todo en orden crea el registro
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

//funcion para mostrar un registro en particular
    public function show(Departamento $departamento)
    {
      return view('departamentos.show',compact('departamento'));
    }

//funcion editar, que envia a la vista donde estara el formulario
    public function edit($id)
    {
      $departamento = departamento::find($id);
      $facultades = Facultad::all();
      return view('departamentos.edit',compact('departamento'),['facultades' => $facultades]);
    }

//funcion que valida los datos para editar, y si esta todo en orden, realiza los cambios    
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
