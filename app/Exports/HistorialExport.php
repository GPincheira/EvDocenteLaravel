<?php

namespace App\Exports;

use App\evaluacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;

//Exportacion realizada para generar Excel con calificaciones historicas de un academico
class HistorialExport implements FromView,ShouldAutoSize,WithEvents
{

    protected $evs;
    protected $Nombres;
    protected $ApellidoPaterno;
    protected $ApellidoMaterno;

//constructor que genera los datos a utilizar
    public function __construct($evs = null, $Nombres = null, $ApellidoPaterno = null, $ApellidoMaterno = null)
    {
        $this->evs = $evs;
        $this->Nombres = $Nombres;
        $this->ApellidoPaterno = $ApellidoPaterno;
        $this->ApellidoMaterno = $ApellidoMaterno;
    }

//se envian a la vista donde seran presentados
    public function view(): View
    {
        return view('evaluaciones.excel',['evs'=>$this->evs],['Nombres'=>$this->Nombres, 'ApellidoPaterno'=>$this->ApellidoPaterno, 'ApellidoMaterno'=>$this->ApellidoMaterno]);
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
