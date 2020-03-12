<?php

namespace App\Http\Controllers;

use App\User;
use App\secFacultad;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
      $users = User::latest()->paginate(10);
      return view('users.index',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function indexelim()
    {
      $users = User::onlyTrashed()->latest()->paginate(10);
      return view('users.index',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function index2()
    {
      $users = User::latest()->paginate(10);
      return view('users.index2',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function index2elim()
    {
      $users = User::onlyTrashed()->latest()->paginate(10);
      return view('users.index2',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function index3()
    {
      $users = User::latest()->paginate(10);
      return view('users.index3',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function index3elim()
    {
      $users = User::onlyTrashed()->latest()->paginate(10);
      return view('users.index3',compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function create2()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create2',compact('roles'));
    }

    public function create3()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create3',compact('roles'));
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
        'id' => ['required','integer','min:1000000','max:25000000','unique:users'],
        'verificador' => ['required','max:1'],
        'email' => ['required','unique:users','email'],
        'password' => ['required','min:6','max:20'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
      ]);
      $password=bcrypt($request['password']);
      $request['password']= $password;
      $user = User::create($request->all());
      $user->assignRole('Administrador');
      return redirect()->route('users.index')
        ->with('success','Administrador creado exitosamente.');
    }

    public function store2(Request $request)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000','unique:users'],
        'verificador' => ['required','max:1'],
        'email' => ['required','unique:users','email'],
        'password' => ['required','min:6','max:20'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
        'CodigoFacultad' => ['required','integer','unique:secFacultades'],
      ]);
      $password=bcrypt($request['password']);
      $request['password']= $password;
      $user = User::create($request->all());
      $user->assignRole('SecFacultad');
      secFacultad::create(['id' => $request['id'], 'CodigoFacultad' => $request['CodigoFacultad']]);
      return redirect()->route('users.index2')
        ->with('success','Usuario creado exitosamente.');
    }

    public function store3(Request $request)
    {
      $request->validate([
        'id' => ['required','integer','min:1000000','max:25000000','unique:users'],
        'verificador' => ['required','max:1'],
        'email' => ['required','unique:users','email'],
        'password' => ['required','min:6','max:20'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
      ]);
      $password=bcrypt($request['password']);
      $request['password']= $password;
      $user = User::create($request->all());
      $user->assignRole('Secretario');
      return redirect()->route('users.index3')
        ->with('success','Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'email' => ['required','unique:users','email'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
      ]);
      $user = user::find($id);
      $user->update($request->all());
      return redirect()->route('users.index')
        ->with('success','Usuario Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = user::find($id);
      $user->delete();
      return redirect()->route('users.index')
        ->with('success','Usuario Eliminado Exitosamente');
    }

    public function reactivar($id)
    {
      $user = user::onlyTrashed()->find($id);
      $user->restore();
      return redirect()->route('users.index')
        ->with('success','Usuario Reactivado Exitosamente');
    }
}
