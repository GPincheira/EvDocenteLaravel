<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        return view('users.create');
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
        'id' => ['required', 'integer'],
        'verificador' => ['required', 'string', 'max:1'],
        'Nombre' => ['required', 'string', 'max:255'],
        'ApellidoPaterno' => ['required', 'string', 'max:255'],
        'ApellidoMaterno' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
        'TipoUsuario' => ['required', 'string', 'max:255'],
        'Estado' => 'Active'
      ]);
      User::create($request->all());
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
     * @param  \App\facultad  $user
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
        'id' => ['required', 'integer'],
        'verificador' => ['required', 'string', 'max:1'],
        'Nombre' => ['required', 'string', 'max:255'],
        'ApellidoPaterno' => ['required', 'string', 'max:255'],
        'ApellidoMaterno' => ['required', 'string', 'max:255'],
        'TipoUsuario' => ['required', 'string', 'max:255'],
        'Estado' => ['required', 'string', 'max:255'],
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
