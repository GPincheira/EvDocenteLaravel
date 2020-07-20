<?php

namespace App\Exports;

use App\evaluacion;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

//Clase para generar la exportacion de Evaluaciones en EXCEL
class EvaluacionesExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $evs;

    public function __construct($evs = null)
    {
        $this->evs = $evs;
    }

//Se declaran las cabeceras del archivo excel
    public function headings(): array
    {
        return [
          [
            'Facultad',
            'Categoria',
            'Nombre',
            '',
            '',
            'Actividades de Docencia',
            '',
            'Actividades de Investigacion',
            '',
            'Extension y Vinculación',
            '',
            'Administración Académico',
            '',
            'Otras Actividades Realizadas',
            '',
            'NotaFinal'
          ],[
            '',
            '',
            '',
            '',
            '',
            'Tiempo',
            'Nota',
            'Tiempo',
            'Nota',
            'Tiempo',
            'Nota',
            'Tiempo',
            'Nota',
            'Tiempo',
            'Nota',
            'NotaFinal'
          ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W2'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                $event->sheet->mergeCells('A1:A2')->mergeCells('B1:B2')->mergeCells('C1:E2')->mergeCells('D1:D2')->mergeCells('P1:P2')
                             ->mergeCells('F1:G1')->mergeCells('H1:I1')->mergeCells('J1:K1')->mergeCells('L1:M1')->mergeCells('N1:O1');
            },
        ];
    }


//Se obtienen las evaluaciones unidas con los academicos en la base de datos, y los parametros necesarios, para luego retornarlos
    public function collection()
    {
        return $this->evs ?: evaluacion::all();

    }
}
