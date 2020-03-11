<?php

namespace App\Http\Controllers;

use App\facultad;
use App\departamento;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $facultades = Facultad::latest()->paginate(10);
      return view('facultades.index',compact('facultades'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function indexelim()
    {
      $facultades = Facultad::onlyTrashed()->latest()->paginate(10);
      return view('facultades.index',compact('facultades'))
        ->with('i',(request()->input('page',1)-1)*5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facultades.create');
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
        'Nombre' => 'required',
        'DecanoNombre' => 'required',
        'DecanoAPaterno' => 'required',
        'DecanoAMaterno' => 'required',
      ]);
      Facultad::create($request->all());
      return redirect()->route('facultades.index')
        ->with('success','Facultad creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facultad = facultad::withTrashed()->find($id);
        return view('facultades.show',compact('facultad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facultad = facultad::find($id);
        return view('facultades.edit',compact('facultad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'id' => 'required',
        'Nombre' => 'required',
        'DecanoNombre' => 'required',
        'DecanoAPaterno' => 'required',
        'DecanoAMaterno' => 'required',
      ]);
      $facultad = facultad::find($id);
      $facultad->update($request->all());
      return redirect()->route('facultades.index')
        ->with('success','Facultad Actualizada Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $facultad = facultad::find($id);
      $facultad->delete();
      return redirect()->route('facultades.index')
        ->with('success','Facultad Eliminada Exitosamente');
    }

    public function reactivar($id)
    {
      $facultad = facultad::onlyTrashed()->find($id);
      $facultad->restore();
      return redirect()->route('facultades.index')
        ->with('success','Facultad Reactivada Exitosamente');
    }
}
