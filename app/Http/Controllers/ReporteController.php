<?php

namespace App\Http\Controllers;

use App\evaluacion;
use Illuminate\Support\Facades\Auth;
use App\Exports\EvaluacionesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
  public function index()
  {
    $evaluacion = Evaluacion::orderBy('año', 'ASC')
              ->first();
    $añoin = $evaluacion->año;
    return view('reportes.index',compact('añoin'));
  }

  public function exportEvaluaciones($año)
  {
    if(@Auth::user()->hasRole('SecFacultad')){
      $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
      $evs = Evaluacion::join('facultades','evaluaciones.CodigoFacultad','=','facultades.id')
                ->join('academicos','evaluaciones.RUTAcademico','=','academicos.id')
                ->where('año',$año)
                ->where('academicos.CodigoFacultad',$CodigoFacultad)
                ->get(['facultades.Nombre','academicos.Categoria','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                       'p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal']);
      return Excel::download(new EvaluacionesExport($evs), 'Reporte_'.$año.'-Fac'.$CodigoFacultad.'.xlsx');
    }
    else{
      $evs = Evaluacion::join('facultades','evaluaciones.CodigoFacultad','=','facultades.id')
                ->join('academicos','evaluaciones.RUTAcademico','=','academicos.id')
                ->where('año',$año)
                ->get(['facultades.Nombre','academicos.Categoria','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                       'p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal']);
      return Excel::download(new EvaluacionesExport($evs), 'Reporte_'.$año.'.xlsx');
    }
  }

  public function pdf($año)
  {
    if(@Auth::user()->hasRole('SecFacultad')){
      $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
      $evs = Evaluacion::join('facultades','evaluaciones.CodigoFacultad','=','facultades.id')
                ->join('academicos','evaluaciones.RUTAcademico','=','academicos.id')
                ->where('año',$año)
                ->where('academicos.CodigoFacultad',$CodigoFacultad)
                ->get(['facultades.Nombre','academicos.Categoria','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                       'p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal']);
      $pdf = PDF::loadView('pdf.reporte',compact('evs','año'))->setPaper('a4', 'landscape');;
      return $pdf->download('Reporte_'.$año.'-Fac'.$CodigoFacultad.'.pdf');
    }
    else{
      $evs = Evaluacion::join('facultades','evaluaciones.CodigoFacultad','=','facultades.id')
                ->join('academicos','evaluaciones.RUTAcademico','=','academicos.id')
                ->where('año',$año)
                ->get(['facultades.Nombre','academicos.Categoria','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                       'p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal']);
      $pdf = PDF::loadView('pdf.reporte',compact('evs','año'))->setPaper('a4', 'landscape');;
      return $pdf->download('Reporte_'.$año.'.pdf');
    }



  }

}
