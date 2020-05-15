<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evaluacion;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

// Controladores que redireccionan informacion a las vistas en la carpeta resources/views/
class ChartController extends Controller
{

  public function index()
  {
      $evaluacion = DB::table('evaluaciones')
                ->select(DB::raw('evaluaciones.NotaFinal, evaluaciones.RUTAcademico'))
                ->get();

      return view('graficos.grafica',['evaluacion'=>$evaluacion]);
  }
}
