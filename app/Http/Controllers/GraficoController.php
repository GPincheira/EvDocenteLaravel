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

//funcion que muestra grafico para facultad o dpto, ademas del listado de academicos que pertenecen
  public function principal(Request $request)
  {
    $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
    $departamentos = Departamento::all()->where('CodigoFacultad',$CodigoFacultad);  //se buscan los dptos para presentarlos en select
    $procesos = proceso::all();
    $año = $request['año'];
    $dpto = departamento::find($request['departamento']);
    $grafcircular = new \stdClass;  //se crea una clase vacia con 5 valores en 0
		$grafcircular->act1=0;
		$grafcircular->act2=0;
		$grafcircular->act3=0;
		$grafcircular->act4=0;
		$grafcircular->act5=0;
    if($dpto == ''){ //si no hay departamento seleccionado, se muestra informacion de toda la facultad
      if ($año == ''){  //si no hay año se le asigna el actual
        $año = date("Y");
      }
      $facultad = Facultad::find($CodigoFacultad);
      $academicos = Academico::where('CodigoFacultad', $CodigoFacultad)->latest()->paginate(5); //academicos de la facultad
      $evaluaciones = Evaluacion::join('academicos','evaluaciones.RUTAcademico','=','academicos.id')  //evaluaciones de la facultad
                    ->where('evaluaciones.CodigoFacultad',$CodigoFacultad)
                    ->where('año', $año)
                    ->get(['academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno','NotaFinal','p1','p2','p3','p4','p5']);
      foreach($evaluaciones as $evaluacion){    //Se recorren las evaluaciones
  			$grafcircular->act1=$grafcircular->act1+$evaluacion->p1; //sumando el % al parametro que corresponde de la nueva clase creada
  			$grafcircular->act2=$grafcircular->act2+$evaluacion->p2; //que contendrá los tiempos asignados para todos los academicos
        $grafcircular->act3=$grafcircular->act3+$evaluacion->p3;
        $grafcircular->act4=$grafcircular->act4+$evaluacion->p4;
        $grafcircular->act5=$grafcircular->act5+$evaluacion->p5;
  		}
      return view('graficos.principal',compact('departamentos', 'procesos', 'año', 'facultad', 'academicos', 'grafcircular', 'evaluaciones'));
    }
    else{  //si se entrega el dpto, se hace la clasificacion solo de este dpto y no de la facultad completa
      $academicos = Academico::where('CodigoDpto', $dpto->id)->latest()->paginate(5);
      $evaluaciones = Evaluacion::join('academicos','evaluaciones.RUTAcademico','=','academicos.id')
                    ->join('departamentos','academicos.CodigoDpto','=','departamentos.id')
                    ->where('año', $año)
                    ->where('departamentos.id', $dpto->id)
                    ->get(['academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno','NotaFinal','p1','p2','p3','p4','p5']);
      foreach($evaluaciones as $evaluacion){
        $grafcircular->act1=$grafcircular->act1+$evaluacion->p1;
        $grafcircular->act2=$grafcircular->act2+$evaluacion->p2;
        $grafcircular->act3=$grafcircular->act3+$evaluacion->p3;
        $grafcircular->act4=$grafcircular->act4+$evaluacion->p4;
        $grafcircular->act5=$grafcircular->act5+$evaluacion->p5;
      }
      return view('graficos.principal',compact('departamentos', 'procesos', 'año', 'dpto', 'academicos', 'grafcircular', 'evaluaciones'));
    }
  }

//funcion que muestra graficos para el academico seleccionado
  public function academico($id, Request $request)
  {
    $procesos = proceso::all();
    $año = $request['año'];
    $academico = academico::find($id);
    $grafcircular = new \stdClass;  //mismo caso anterior, se genera una nueva clase para los % de cada actividad
		$grafcircular->act1=0;
		$grafcircular->act2=0;
		$grafcircular->act3=0;
		$grafcircular->act4=0;
		$grafcircular->act5=0;
    //se seleccionan todas las evaluaciones que corresponden al academico que se grafica
    $evaluaciones = Evaluacion::orderBy('año', 'ASC')->where('RUTAcademico', $id)->get(['año','p1','p2','p3','p4','p5','NotaFinal']);
    foreach($evaluaciones as $evaluacion){  //se recorren las evaluaciones
      if (($año == '') || ($evaluacion->año == $año)){     //si no hay año o el año corresponde al que se esta graficando
        $grafcircular->act1=$grafcircular->act1+$evaluacion->p1;  //se acumulan los tiempos para ser graficados
        $grafcircular->act2=$grafcircular->act2+$evaluacion->p2;
        $grafcircular->act3=$grafcircular->act3+$evaluacion->p3;
        $grafcircular->act4=$grafcircular->act4+$evaluacion->p4;
        $grafcircular->act5=$grafcircular->act5+$evaluacion->p5;
      }
    }
    return view('graficos.academico',compact('procesos', 'año', 'academico', 'evaluaciones', 'grafcircular'));
  }
}
