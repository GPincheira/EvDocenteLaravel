<?php

namespace App\Http\Controllers;

use App\evaluacion;
use App\departamento;
use App\facultad;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraficoController extends Controller
{
  public function principal()
  {
    $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
//    $departamentos = Departamento::all()->where('CodigoFacultad',$CodigoFacultad);

    $totales = DB::table('evaluaciones')->select(DB::raw('sum(p1)'));


    $lala = Evaluacion::join('')->sum('p1')->where('CodigoFacultad',$CodigoFacultad);

    dd($totales);
//    $balance = DB::table('data')->sum('balance')->where('user_id' '=' $id);
//    SELECT Sum(PrecioUnidad * Cantidad) AS Total FROM DetallePedido;

    return view('graficos.principal',compact('departamentos'));
  }
}
