<?php

namespace App\Exports;

use App\evaluacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistorialExport implements FromCollection
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

    public function collection()
    {
        return $this->evs ?: evaluacion::all();
    }
}
