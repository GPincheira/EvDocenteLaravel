<?php

namespace App\Http\Controllers;

use App\secFacultad;
use Illuminate\Http\Request;

class SecFacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $secFacultades = SecFacultad::latest()->paginate(10);
      return view('secFacultades.index',compact('secFacultades'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secFacultades.create');
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
        'CodigoFacultad' => 'required',
      ]);
      SecFacultad::create($request->all());
      return redirect()->route('secFacultades.index')
        ->with('success','Secretario de Facultad creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\secFacultad  $secFacultad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $secFacultad = secFacultad::find($id);
      return view('secFacultades.show',compact('secFacultad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\secFacultad  $secFacultad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $secFacultad = secFacultad::find($id);
      return view('secFacultades.edit',compact('secFacultad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\secFacultad  $secFacultad
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\secFacultad  $secFacultad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $secFacultad = secFacultad::find($id);
      $secFacultad->delete();
      return redirect()->route('secFacultades.index')
        ->with('success','Secretario de Facultad Eliminado Exitosamente');
    }
}
