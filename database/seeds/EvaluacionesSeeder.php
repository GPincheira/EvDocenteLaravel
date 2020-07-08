<?php

use Illuminate\Database\Seeder;
use App\evaluacion;

class EvaluacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '10752674',
        'CodigoComision' => '1',
        'CodigoFacultad' => '8492',
        'año' => '2018',
        'Argumento' => 'Excelente rendimiento en lineas generales',
        'n1' => '5',
        'n2' => '5',
        'n3' => '5',
        'n4' => '0',
        'n5' => '4.3',
        'p1' => '30',
        'p2' => '30',
        'p3' => '30',
        'p4' => '0',
        'p5' => '10',
        'NotaFinal' => '4.93',
      ]);

      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '10752674',
        'CodigoComision' => '2',
        'CodigoFacultad' => '8492',
        'año' => '2019',
        'Argumento' => 'Rendimiento mas bajo que el año anterior',
        'n1' => '3',
        'n2' => '3.5',
        'n3' => '5',
        'n4' => '2.4',
        'n5' => '4.3',
        'p1' => '20',
        'p2' => '30',
        'p3' => '20',
        'p4' => '15',
        'p5' => '15',
        'NotaFinal' => '3.56',
      ]);
    }
}
