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
    $dpto = departamento::find($request['departamento']);
    if($dpto == ''){ //no hay dpto
      if ($año == ''){  //tampoco año
        $año = date("Y");
      }
      $facultad = Facultad::find($CodigoFacultad);
      $academicos = Academico::where('CodigoFacultad', $CodigoFacultad)->latest()->paginate(10);
      return view('graficos.principal',compact('departamentos', 'procesos', 'año', 'facultad', 'academicos'));
    }
    else{   //ambos estan
      $academicos = Academico::where('CodigoDpto', $dpto->id)->latest()->paginate(10);
      return view('graficos.principal',compact('departamentos', 'procesos', 'año', 'dpto', 'academicos'));
    }
  }

  public function academico()
  {
    
  }
}
