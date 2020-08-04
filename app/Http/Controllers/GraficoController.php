<?php

namespace App\Http\Controllers;

use App\evaluacion;
use App\departamento;
use App\facultad;
use App\academico;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraficoController extends Controller
{
  public function principal(Request $request)
  {
/*    $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
//    $departamentos = Departamento::all()->where('CodigoFacultad',$CodigoFacultad);

    $totales = DB::table('evaluaciones')->select(DB::raw('sum(p1)'));


    $lala = Evaluacion::join('')->sum('p1')->where('CodigoFacultad',$CodigoFacultad);

    dd($totales);
//    $balance = DB::table('data')->sum('balance')->where('user_id' '=' $id);
//    SELECT Sum(PrecioUnidad * Cantidad) AS Total FROM DetallePedido;

    return view('graficos.principal',compact('departamentos'));*/

  $evaluaciones=Evaluacion::where('CodigoFacultad','=',@Auth::user()->secFacultad->CodigoFacultad)->get();
  $datosGrafico = new \stdClass;
  $datosGrafico->totalActividad1=0;
  $datosGrafico->totalActividad2=0;
  $datosGrafico->totalActividad3=0;
  $datosGrafico->totalActividad4=0;
  $datosGrafico->totalActividad5=0;

  foreach($evaluaciones as $dato){
    if($dato->tiempoActividad1!=""){
      $datosGrafico->totalActividad1=$datosGrafico->totalActividad1+$dato->tiempoActividad1;
    }
    if($dato->tiempoActividad2!=""){
      $datosGrafico->totalActividad2=$datosGrafico->totalActividad2+$dato->tiempoActividad2;
    }
    if($dato->tiempoActividad3!=""){
      $datosGrafico->totalActividad3=$datosGrafico->totalActividad3+$dato->tiempoActividad3;
    }
    if($dato->tiempoActividad4!=""){
      $datosGrafico->totalActividad4=$datosGrafico->totalActividad4+$dato->tiempoActividad4;
    }
    if($dato->tiempoActividad5!=""){
      $datosGrafico->totalActividad5=$datosGrafico->totalActividad5+$dato->tiempoActividad5;
    }
  }
  $departamentos=Departamento::where('CodigoFacultad','=',@Auth::user()->secFacultad->CodigoFacultad)->get();
  $seleccionado = new \stdClass;
  $seleccionado->periodo="";
  $seleccionado->departamento="";

  $academicos=Academico::join('departamentos as d1', 'academicos.CodigoDpto','=','d1.id')->where('d1.CodigoFacultad','=',@Auth::user()->secFacultad->CodigoFacultad)->get();
  if($evaluaciones=="[]"){
    return view('graficos.principal',compact('datosGrafico','departamentos','seleccionado','academicos'))->with('Mensaje','No hay datos para mostrar');
  }else{
    dd($academicos);
    return view('graficos.principal',compact('datosGrafico','departamentos','seleccionado','academicos'));
  }
}
}
