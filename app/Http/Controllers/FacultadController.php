<?php

namespace App\Http\Controllers;

use App\facultad;
use App\departamento;
use App\User;
use App\secFacultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{

//En index se obtiene el listado completo de facultades y se paginan de 10.
    public function index()
    {
      $facultades = Facultad::orderBy('id','ASC')->latest()->paginate(10);
      return view('facultades.index',compact('facultades'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

//Index para ver los eliminados, con onlyTrashed()
    public function indexelim()
    {
      $facultades = Facultad::orderBy('id','ASC')->onlyTrashed()->latest()->paginate(10);
      return view('facultades.index',compact('facultades'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

//funcion crear, que luego lleva a la vista para la creacion
    public function create()
    {
        return view('facultades.create');
    }

//funcion para validar los datos que se ingresan en la blade de crear, se revisa que este todo en orden y se guarda el registro
    public function store(Request $request)
    {
      $request->validate([
        'id' => ['required','integer','unique:facultades'],
        'Nombre' => ['required','unique:facultades'],
        'DecanoNombre' => 'required',
        'DecanoAPaterno' => 'required',
        'DecanoAMaterno' => 'required',
      ]);
      Facultad::create($request->all());
      if ($request['deleted_at'] == "Inactivo"){
        Facultad::destroy($request['id']);
      }
      return redirect()->route('facultades.index')
        ->with('success','Facultad creada exitosamente.');
    }

//funcion para mostrar cada registro, este eliminado o no
    public function show(Facultad $facultad)
    {
        return view('facultades.show',compact('facultad'));
    }

//funcion para editar, que busca el $id que se quiere, y luego lleva a la vista donde se ingresan los datos
    public function edit($id)
    {
        $facultad = facultad::find($id);
        return view('facultades.edit',compact('facultad'));
    }

//se validan los datos de la edicion y se guarda si todo esta correcto
    public function update(Request $request, $id)
    {
      $request->validate([
        'id' => ['required','integer'],
        'Nombre' => 'required',
        'DecanoNombre' => 'required',
        'DecanoAPaterno' => 'required',
        'DecanoAMaterno' => 'required',
      ]);
      $facultad = facultad::find($id);
      $facultad->update($request->all());
      if ($request['deleted_at'] == "Inactivo"){
        Facultad::destroy($id);
      }
      return redirect()->route('facultades.index')
        ->with('success','Facultad Actualizada Exitosamente');
    }

//funcion para eliminar (soft)
    public function destroy($id)
    {
      $facultad = facultad::find($id);
      $userEliminar = secFacultad::where('CodigoFacultad', '=', $id)->first();
      $facultad->delete();
      if($userEliminar != null){
        $user = User::find($userEliminar->id);
        $user->delete();
      }
      return redirect()->route('facultades.index')
        ->with('success','Facultad Eliminada Exitosamente');
    }

//funcion para reactivar un registro eliminado, se busa su $id entre los elementos eliminados y se usa restore
    public function reactivar($id)
    {
      $facultad = facultad::onlyTrashed()->find($id);
      $facultad->restore();
      return redirect()->route('facultades.index')
        ->with('success','Facultad Reactivada Exitosamente');
    }
}
