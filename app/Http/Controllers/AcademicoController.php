<?php

namespace App\Http\Controllers;

use App\academico;
use Illuminate\Http\Request;

class AcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $academicos = Academico::latest()->paginate(10);
      return view('academicos.index',compact('academicos'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academicos.create');
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
        'verificador' => 'required',
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
        'TituloProfesional' => 'required',
        'GradoAcademico' => 'required',
        'CodigoDpto' => 'required',
        'Categoria' => 'required',
        'HorasContrato' => 'required',
        'TipoPlanta' => 'required',
        'Estado' => 'required',
      ]);
      Academico::create($request->all());
      return redirect()->route('academicos.index')
        ->with('success','Academico creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\academico  $academico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $academico = academico::find($id);
      return view('academicos.show',compact('academico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\academico  $academico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $academico = academico::find($id);
      return view('academicos.edit',compact('academico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\academico  $academico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'verificador' => 'required',
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
        'TituloProfesional' => 'required',
        'GradoAcademico' => 'required',
        'CodigoDpto' => 'required',
        'Categoria' => 'required',
        'HorasContrato' => 'required',
        'TipoPlanta' => 'required',
        'Estado' => 'required',
      ]);
      $academico = academico::find($id);
      $academico->update($request->all());
      return redirect()->route('academicos.index')
        ->with('success','Academico Actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\academico  $academico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $academico = academico::find($id);
      $academico->delete();
      return redirect()->route('academicos.index')
        ->with('success','Academico Eliminado Exitosamente');
    }
}
