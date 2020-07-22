<?php

namespace App\Exports;

use App\evaluacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;

class EvaluacionesExport implements FromView,ShouldAutoSize,WithEvents
{

    protected $evs;
    protected $año;

    public function __construct($evs = null, $año = null)
    {
        $this->evs = $evs;
        $this->año = $año;

    }

    public function view(): View
    {
        return view('reportes.excel', ['año'=>$this->año], ['evs'=>$this->evs]);
    }

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
