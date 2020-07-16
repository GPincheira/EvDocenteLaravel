<?php

namespace App\Exports;

use App\evaluacion;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

//Clase para generar la exportacion de Evaluaciones en EXCEL
class EvaluacionesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

//Se declaran las cabeceras del archivo excel
    public function headings(): array
    {
        return [
            'año',
            'Codigo Comision',
            'RUT Academico',
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            '%',
            'Nota 1',
            '%',
            'Nota 2',
            '%',
            'Nota 3',
            '%',
            'Nota 4',
            '%',
            'Nota 5',
            'NotaFinal'
        ];
    }

//Se obtienen las evaluaciones unidas con los academicos en la base de datos, y los parametros necesarios, para luego retornarlos
    public function collection()
    {
         $evaluaciones = DB::table('evaluaciones')->join('academicos','evaluaciones.RUTAcademico','=','academicos.id')
         ->orderBy('año')->select('evaluaciones.año','evaluaciones.CodigoComision','evaluaciones.RUTAcademico','academicos.Nombre',
         'academicos.ApellidoPaterno','academicos.ApellidoMaterno','p1','n1','p2','n2','p3','n3','p4','n4','p5','n5','NotaFinal')->get();
         return $evaluaciones;

    }
}
