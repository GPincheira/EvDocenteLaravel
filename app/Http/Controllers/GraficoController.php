<?php

namespace App\Http\Controllers;

use App\evaluacion;
use App\departamento;
use App\facultad;
use App\academico;
use App\Proceso;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraficoController extends Controller
{
  public function principal(Request $request)
  {
    $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
    $departamentos = Departamento::all()->where('CodigoFacultad',$CodigoFacultad);
    $procesos = proceso::all();
    $año = $request['año'];
    $dpto = $request['departamento'];
    return view('graficos.principal',compact('departamentos', 'procesos', 'año', 'dpto'));
  }
}
