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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'id' => 'required',
        'verificador' => 'required',
        'email' => 'required',
        'password' => 'required',
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
        'Estado' => 'Activo',
        'roles' => 'required',
      ]);
      $password=bcrypt($request['password']);
      $request['password']= $password;
      $user = User::create($request->all());
      $user->assignRole($request->input('roles'));

      secFacultad::create(['id' => $request['id'], 'CodigoFacultad' => '123']); //mejorar ingreso del codigo




      return redirect()->route('users.index')
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
        'email' => 'required',
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
}
