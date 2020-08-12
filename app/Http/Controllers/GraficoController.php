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
    $grafcircular = new \stdClass;
		$grafcircular->act1=0;
		$grafcircular->act2=0;
		$grafcircular->act3=0;
		$grafcircular->act4=0;
		$grafcircular->act5=0;
    if($dpto == ''){ //no hay dpto
      if ($año == ''){  //tampoco año
        $año = date("Y");
      }
      $facultad = Facultad::find($CodigoFacultad);
      $academicos = Academico::where('CodigoFacultad', $CodigoFacultad)->latest()->paginate(10);
      $evaluaciones = Evaluacion::all()->where('CodigoFacultad',$CodigoFacultad)
                    ->where('año', $año);
      foreach($evaluaciones as $evaluacion){
  			$grafcircular->act1=$grafcircular->act1+$evaluacion->p1;
  			$grafcircular->act2=$grafcircular->act2+$evaluacion->p2;
        $grafcircular->act3=$grafcircular->act3+$evaluacion->p3;
        $grafcircular->act4=$grafcircular->act4+$evaluacion->p4;
        $grafcircular->act5=$grafcircular->act5+$evaluacion->p5;
  		}
      return view('graficos.principal',compact('departamentos', 'procesos', 'año', 'facultad', 'academicos'));
    }
    else{   //ambos estan
      $academicos = Academico::where('CodigoDpto', $dpto->id)->latest()->paginate(10);
      $evaluaciones = Evaluacion::join('academicos','evaluaciones.RUTAcademico','=','academicos.id')
                    ->join('departamentos','academicos.CodigoDpto','=','departamentos.id')
                    ->where('año', $año)
                    ->where('departamentos.id', $dpto->id)
                    ->get(['p1','p2','p3','p4','p5']);
      foreach($evaluaciones as $evaluacion){
        $grafcircular->act1=$grafcircular->act1+$evaluacion->p1;
        $grafcircular->act2=$grafcircular->act2+$evaluacion->p2;
        $grafcircular->act3=$grafcircular->act3+$evaluacion->p3;
        $grafcircular->act4=$grafcircular->act4+$evaluacion->p4;
        $grafcircular->act5=$grafcircular->act5+$evaluacion->p5;
      }
      return view('graficos.principal',compact('departamentos', 'procesos', 'año', 'dpto', 'academicos'));
    }
  }

  public function academico($id, Request $request)
  {
    $procesos = proceso::all();
    $año = $request['año'];
    $elegido = academico::find($id);
    $grafcircular = new \stdClass;
		$grafcircular->act1=0;
		$grafcircular->act2=0;
		$grafcircular->act3=0;
		$grafcircular->act4=0;
		$grafcircular->act5=0;
    $evaluaciones = Evaluacion::where('RUTAcademico', $id)->get(['p1','p2','p3','p4','p5']);
    if ($año == ''){  //tampoco año
      $evaluaciones = Evaluacion::where('RUTAcademico', $id)->get(['p1','p2','p3','p4','p5']);
    }
    else{
      $evaluaciones = Evaluacion::where('RUTAcademico', $id)->where('año', $año)->get(['p1','p2','p3','p4','p5']);
    }
    foreach($evaluaciones as $evaluacion){
      $grafcircular->act1=$grafcircular->act1+$evaluacion->p1;
      $grafcircular->act2=$grafcircular->act2+$evaluacion->p2;
      $grafcircular->act3=$grafcircular->act3+$evaluacion->p3;
      $grafcircular->act4=$grafcircular->act4+$evaluacion->p4;
      $grafcircular->act5=$grafcircular->act5+$evaluacion->p5;
    }
    return view('graficos.academico',compact('procesos', 'año', 'elegido'));
  }
}
