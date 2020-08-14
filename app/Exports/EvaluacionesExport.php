<?php

namespace App\Exports;

use App\evaluacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;

//Exportacion realizada para generar Excel con calificaciones de cierto año
class EvaluacionesExport implements FromView,ShouldAutoSize,WithEvents
{

    protected $evs;
    protected $año;

//constructor que genera los datos a utilizar
    public function __construct($evs = null, $año = null)
    {
        $this->evs = $evs;
        $this->año = $año;
    }

//se envian a la vista donde seran presentados
    public function view(): View
    {
        return view('reportes.excel', ['año'=>$this->año], ['evs'=>$this->evs]);
    }

//eventos para editar cierta parte como negrita
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A3:N6'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
            },
        ];
    }

    public function collection()
    {
        return $this->evs ?: evaluacion::all();
    }
}
