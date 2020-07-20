<?php

namespace App\Exports;

use App\evaluacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class HistorialExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $evs;

    public function __construct($evs = null)
    {
        $this->evs = $evs;
    }

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

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(20);
            },
        ];
    }

    public function collection()
    {
        return $this->evs ?: evaluacion::all();
    }
}
