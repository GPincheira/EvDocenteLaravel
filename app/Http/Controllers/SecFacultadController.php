<?php

namespace App\Http\Controllers;

use App\secFacultad;
use App\User;
use Illuminate\Http\Request;

class SecFacultadController extends Controller
{

    public function index()
    {
      $secFacultades = SecFacultad::latest()->paginate(10);
      return view('secFacultades.index',compact('secFacultades'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('secFacultades.create');
    }

  //validacion de los datos para crear un nuevo sec de facultad
     public function store(Request $request)
     {
       $request->validate([
         'id' => ['required','integer','min:1000000','max:25000000','unique:secFacultades'],
         'CodigoFacultad' => ['required','integer','unique:secFacultades']
       ]);
       SecFacultad::create($request->all());
       return redirect()->route('users.index')
         ->with('success','Secretario de Facultad creado exitosamente.');
     }

    public function show(SecFacultad $secFacultad)
    {
        return view('secFacultades.show',compact('secFacultad'));
    }

    public function edit($id)
    {
      $secFacultad = secFacultad::find($id);
      return view('secFacultades.edit',compact('secFacultad'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'CodigoFacultad' => 'required',
      ]);
      $secFacultad = secFacultad::find($id);
      $secFacultad->update($request->all());
      return redirect()->route('secFacultades.index')
        ->with('success','Secretario de Facultadad Actualizado Exitosamente');
    }

    public function destroy($id)
    {
      $secFacultad = secFacultad::find($id);
      $secFacultad->delete();
      return redirect()->route('secFacultades.index')
        ->with('success','Secretario de Facultad Eliminado Exitosamente');
    }
}
