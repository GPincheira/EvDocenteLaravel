<?php

namespace App\Http\Controllers;

use App\User;
use App\secFacultad;
use App\facultad;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

//En el controlador de usuario existen varios index, uno para cada tipo de usuario, y cada uno con un index para eliminados
//index para administradores
    public function index()
    {
      $users = User::orderBy('ApellidoPaterno')->where('Rol','Administrador')->latest()->paginate(10);
      return view('users.index',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

//index para administradores eliminados
    public function indexelim()
    {
      $users = User::orderBy('ApellidoPaterno')->where('Rol','Administrador')->onlyTrashed()->latest()->paginate(10);
      return view('users.index',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

//index para secretarios de facultad
    public function index2()
    {
      $users = User::orderBy('ApellidoPaterno')->where('Rol','SecFacultad')->latest()->paginate(10);
      return view('users.index2',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

//index para secretarios de facultad eliminados
    public function index2elim()
    {
      $users = User::orderBy('ApellidoPaterno')->where('Rol','SecFacultad')->onlyTrashed()->latest()->paginate(10);
      $secFacultad = secFacultad::onlyTrashed()->latest()->paginate(10);
      return view('users.index2',compact('users'),['secFacultad'=>$secFacultad])
        ->with('i',(request()->input('page',1)-1)*5);
    }

//index para secretarios
    public function index3()
    {
      $users = User::orderBy('ApellidoPaterno')->where('Rol','Secretaria')->latest()->paginate(10);
      return view('users.index3',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

//index para secretarios eliminados
    public function index3elim()
    {
      $users = User::orderBy('ApellidoPaterno')->where('Rol','Secretaria')->onlyTrashed()->latest()->paginate(10);
      return view('users.index3',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

//En el controlador de usuario existen varias funciones para crear, uno para cada tipo de usuario
//funcion para crear administradores, envia a la vista donde estara el formulario
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

//funcion para crear sec de facultad, envia a la vista donde estara el formulario
    public function create2()
    {
        $roles = Role::pluck('name','name')->all();
        $facultades = Facultad::all();
        return view('users.create2',compact('roles'),['facultades' => $facultades]);
    }

//funcion para crear secretarios, envia a la vista donde estara el formulario
    public function create3()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create3',compact('roles'));
    }

//existe un store para cada tipo de usuarios
//funcion store para administradores, recibe el request del formulario y guarda en la BD si no hay errores
    public function store(Request $request)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000','unique:users'],
        'verificador' => ['required','max:1'],
        'email' => ['required','unique:users','email'],
        'password' => ['required','min:6','max:20'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required'
      ]);
      $password=bcrypt($request['password']); //se encripta la contraseña ingresada
      $request['password']= $password;
      $request['Rol']= 'Administrador';
      $user = User::create($request->all());
      $user->assignRole('Administrador'); //se le asigna el rol de Administrador
      if ($request['deleted_at'] == "Inactivo"){
        User::destroy($request['id']);
      }
      return redirect()->route('users.index')
        ->with('success','Administrador creado exitosamente.');
    }

//funcion store para sec de facultad, recibe el request del formulario y guarda en la BD si no hay errores
    public function store2(Request $request)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000','unique:users'],
        'verificador' => ['required','max:1'],
        'email' => ['required','unique:users','email'],
        'password' => ['required','min:6','max:20'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'CodigoFacultad' => ['required','integer','unique:secFacultades'],
      ]);
      $password=bcrypt($request['password']);
      $request['password']= $password;
      $request['Rol']= 'SecFacultad';
      $user = User::create($request->all());
      $user->assignRole('SecFacultad'); //se le asigna el rol de secretario de facultad
      secFacultad::create(['id' => $request['id'], 'CodigoFacultad' => $request['CodigoFacultad']]);  //se crea un registro en los sec de facultad
      if ($request['deleted_at'] == "Inactivo"){
        User::destroy($request['id']);
        secFacultad::destroy($request['id']);
      }
      return redirect()->route('users.index2')
        ->with('success','Usuario creado exitosamente.');
    }

//funcion store para secretarios, recibe el request del formulario y guarda en la BD si no hay errores
    public function store3(Request $request)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000','unique:users'],
        'verificador' => ['required','max:1'],
        'email' => ['required','unique:users','email'],
        'password' => ['required','min:6','max:20'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required'
      ]);
      $password=bcrypt($request['password']);
      $request['password']= $password;
      $request['Rol']= 'Secretaria';
      $user = User::create($request->all());
      if ($request['deleted_at'] == "Inactivo"){
        User::destroy($request['id']);
      }
      $user->assignRole('Secretario');     //se le asigna el rol de Secretario
      return redirect()->route('users.index3')
        ->with('success','Usuario creado exitosamente.');
    }

//funcion que lleva a una vista para mostrar informacion de un registro en particular
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

//funcion para editar usuarios, envia a la vista donde estara el formulario
    public function edit($id)
    {
        $user = user::find($id);
        $facultades = Facultad::all();
        return view('users.edit',compact('user'),['facultades' => $facultades]);
    }

//funcion que recibe el request del formulario, y actualiza si no hay errores
    public function update(Request $request, $id)
    {
      $request->validate([
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'email' => ['required','email']
      ]);
      $user = user::find($id);    //se busca el usuario a modificar
      $user->update($request->all());
      if ($request['deleted_at'] == "Inactivo"){
        User::destroy($id);
      }
      return redirect()->route('users.index')
        ->with('success','Usuario Actualizado Exitosamente');
    }

//funcion para eliminar un usuario con delete()
    public function destroy($id)
    {
      $user = user::find($id);
      $user->delete();
      return Redirect()->back()->with('success','Usuario Eliminado Exitosamente');
    }

//funcion para reactivar un usuario utilizando restore()
    public function reactivar($id)
    {
      $user = user::onlyTrashed()->find($id);
      $user->restore();
      return Redirect()->back()->with('success','Usuario Reactivado Exitosamente');
    }
}
