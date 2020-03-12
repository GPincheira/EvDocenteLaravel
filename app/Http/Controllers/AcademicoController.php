<?php

namespace App\Http\Controllers;

use App\academico;
use App\departamento;
use App\facultad;
use App\secFacultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      if(@Auth::user()->hasRole('SecFacultad')){
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $departamentos = Facultad::find($CodigoFacultad)->departamentos;
        return view('academicos.index',compact('academicos'),['departamentos' => $departamentos])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        return view('academicos.index',compact('academicos'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

    public function indexelim()
    {
      $academicos = Academico::onlyTrashed()->latest()->paginate(10);
      if(@Auth::user()->hasRole('SecFacultad')){
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $departamentos = Facultad::find($CodigoFacultad)->departamentos;
        return view('academicos.index',compact('academicos'),['departamentos' => $departamentos])
          ->with('i',(request()->input('page',1)-1)*5);
      }
      else{
        return view('academicos.index',compact('academicos'))
          ->with('i',(request()->input('page',1)-1)*5);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $secFacultades = SecFacultad::all();
        return view('academicos.create',['departamentos' => $departamentos],['secFacultades' => $secFacultades]);
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
        'id' => ['required','integer','min:1000000','max:25000000','unique:academicos'],
        'verificador' => ['required','max:1'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
        'TituloProfesional' => 'required',
        'GradoAcademico' => 'required',
        'CodigoDpto' => ['required','integer'],
        'Categoria' => 'required',
        'HorasContrato' => ['required','integer','min:0','max:44'],
        'TipoPlanta' => 'required',
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
      $departamentos = Departamento::all();
      $secFacultades = SecFacultad::all();
      return view('academicos.edit',compact('academico'),['departamentos' => $departamentos,'secFacultades' => $secFacultades]);
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
        'id' => ['required','integer','min:1000000','max:25000000','unique:academicos'],
        'verificador' => ['required','max:1'],
        'Nombre' => 'required',
        'ApellidoPaterno' => 'required',
        'ApellidoMaterno' => 'required',
        'TituloProfesional' => 'required',
        'GradoAcademico' => 'required',
        'CodigoDpto' => ['required','integer'],
        'Categoria' => 'required',
        'HorasContrato' => ['required','integer','min:0','max:44'],
        'TipoPlanta' => 'required',
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

    public function reactivar($id)
    {
      $academico = academico::onlyTrashed()->find($id);
      $academico->restore();
      return redirect()->route('academicos.index')
        ->with('success','Academico Reactivado Exitosamente');
    }
}
