<?php

namespace App\Http\Controllers;

use App\evaluacion;
use App\academico;
use App\facultad;
use App\comision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $evaluaciones = Evaluacion::latest()->paginate(10);
      return view('evaluaciones.index',compact('evaluaciones'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
        $academicos = Academico::all();
        $comisiones = Comision::all();
        $departamentos = Facultad::find($CodigoFacultad)->departamentos;
        return view('evaluaciones.create',['academicos' => $academicos , 'departamentos' => $departamentos , 'comisiones' => $comisiones]);
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
        'CodigoComision' => ['required','integer'],
        'RUTAcademico' => ['required','integer','min:1000000','max:25000000'],
        'Argumento' => ['required','max:100'],
        'p1' => ['integer','min:0','max:100'],
        'n1' => ['numeric','min:1','max:5'],
        'p2' => ['integer','min:0','max:100'],
        'n2' => ['numeric','min:1','max:5'],
        'p3' => ['integer','min:0','max:100'],
        'n3' => ['numeric','min:1','max:5'],
        'p4' => ['integer','min:0','max:100'],
        'n4' => ['numeric','min:1','max:5'],
        'p5' => ['integer','min:0','max:100'],
        'n5' => ['numeric','min:1','max:5'],
      ]);
      if($request['p1']+$request['p2']+$request['p3']+$request['p4']+$request['p5'] == 100){
        $request['NotaFinal']=($request['n1']*$request['p1']+$request['n2']*$request['p2']+$request['n3']*$request['p3']+$request['n4']*$request['p4']+$request['n5']*$request['p5'])/100;
        Evaluacion::create($request->all());
        return redirect()->route('evaluaciones.index')
          ->with('success','Evaluacion creada exitosamente.');
      }
      else{
      return redirect()->route('evaluaciones.index')
        ->with('success','Los porcentajes deben sumar 100%.');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $evaluacion = evaluacion::find($id);
      return view('evaluaciones.show',compact('evaluacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $evaluacion = evaluacion::find($id);
      return view('evaluaciones.edit',compact('evaluacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'CodigoComision' => ['required','integer'],
        'RUTAcademico' => ['required','integer','min:1000000','max:25000000','unique:users'],
        'Argumento' => ['required','max:100'],
        'p1' => ['integer','min:0','max:100'],
        'n1' => ['numeric','min:1','max:5'],
        'p2' => ['integer','min:0','max:100'],
        'n2' => ['numeric','min:1','max:5'],
        'p3' => ['integer','min:0','max:100'],
        'n3' => ['numeric','min:1','max:5'],
        'p4' => ['integer','min:0','max:100'],
        'n4' => ['numeric','min:1','max:5'],
        'p5' => ['integer','min:0','max:100'],
        'n5' => ['numeric','min:1','max:5'],
      ]);
      $evaluacion = evaluacion::find($id);
      $evaluacion->update($request->all());
      return redirect()->route('evaluaciones.index')
        ->with('success','Evaluacion Actualizada Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $evaluacion = evaluacion::find($id);
      $evaluacion->delete();
      return redirect()->route('evaluaciones.index')
        ->with('success','Evaluacion Eliminada Exitosamente');
    }
}
