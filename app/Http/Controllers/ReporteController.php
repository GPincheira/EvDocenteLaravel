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

//funcion index que presenta el listado de años con los botones para generar reportes
  public function index()
  {
    if(@Auth::user()->hasRole('SecFacultad')){
      $evaluacion = Evaluacion::where('CodigoFacultad',@Auth::user()->secFacultad->CodigoFacultad)->orderBy('año', 'ASC')
                ->first();  //se busca la primera evaluacion que se generó para la facultad
    }
    else{
      $evaluacion = Evaluacion::orderBy('año', 'ASC')->first(); //se busca la primera evaluacion que se generó
    }
    if($evaluacion){
      $añoin = $evaluacion->año;
      return view('reportes.index',compact('añoin')); //se pasa la vista con el año de la primera evaluacion
    }
    return view('reportes.index');
  }

//funcion para exportar un reporte en Excel, recibiendo un año
  public function exportEvaluaciones($año)
  {
    if(@Auth::user()->hasRole('SecFacultad')){    //si es secretario de facultad, se exportan solo estos datos
      $CodigoFacultad = @Auth::user()->secFacultad->CodigoFacultad;
      $evs = Evaluacion::join('facultades','evaluaciones.CodigoFacultad','=','facultades.id') //se genera listado de evaluaciones
                ->join('academicos','evaluaciones.RUTAcademico','=','academicos.id')  //unido a informacion del academico y el año
                ->where('año',$año)
                ->where('academicos.CodigoFacultad',$CodigoFacultad)
                ->get(['facultades.Nombre','academicos.Categoria','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                       'p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal']);
      return Excel::download(new EvaluacionesExport($evs,$año), 'Reporte_'.$año.'-Fac'.$CodigoFacultad.'.xlsx');  //realiza la descarga del doc excel
    }
    else{
      $evs = Evaluacion::join('facultades','evaluaciones.CodigoFacultad','=','facultades.id') //se genera listado de evaluaciones
                ->join('academicos','evaluaciones.RUTAcademico','=','academicos.id')  //unido a informacion del academico y el año
                ->where('año',$año)
                ->get(['facultades.Nombre','academicos.Categoria','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                       'p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal']);
      return Excel::download(new EvaluacionesExport($evs,$año), 'Reporte_'.$año.'.xlsx'); //realiza descarga del reporte en pdf
    }
  }

//funcion para exportar el reporte en PDF, recibiendo un año
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
      $pdf = PDF::loadView('pdf.reporte',compact('evs','año'))->setPaper('a4', 'landscape');
      return $pdf->download('Reporte_'.$año.'-Fac'.$CodigoFacultad.'.pdf');
    }
    else{
      $evs = Evaluacion::join('facultades','evaluaciones.CodigoFacultad','=','facultades.id')
                ->join('academicos','evaluaciones.RUTAcademico','=','academicos.id')
                ->where('año',$año)
                ->get(['facultades.Nombre','academicos.Categoria','academicos.Nombres','academicos.ApellidoPaterno','academicos.ApellidoMaterno',
                       'p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal']);
      $pdf = PDF::loadView('pdf.reporte',compact('evs','año'))->setPaper('a4', 'landscape');
      return $pdf->download('Reporte_'.$año.'.pdf');
    }
  }

}
