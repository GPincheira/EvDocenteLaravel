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
        'año' => '2017',
        'Argumento' => 'Rendimiento mas bajo de lo esperado',
        'n1' => '5',
        'n2' => '4',
        'n3' => '5',
        'n4' => '1.3',
        'n5' => '4.2',
        'p1' => '30',
        'p2' => '25',
        'p3' => '30',
        'p4' => '5',
        'p5' => '10',
        'NotaFinal' => '4.49',
      ]);

      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '12764362',
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
        'año' => '2018',
        'Argumento' => 'Rendimiento excelente',
        'n1' => '5',
        'n2' => '5',
        'n3' => '5',
        'n4' => '5',
        'n5' => '5',
        'p1' => '30',
        'p2' => '30',
        'p3' => '30',
        'p4' => '0',
        'p5' => '10',
        'NotaFinal' => '5',
      ]);

      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '10752674',
        'CodigoComision' => '3',
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

      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '12764362',
        'CodigoComision' => '3',
        'CodigoFacultad' => '8492',
        'año' => '2019',
        'Argumento' => 'Mejoro aun mas su rendimiento',
        'n1' => '5',
        'n2' => '5',
        'n3' => '0',
        'n4' => '0',
        'n5' => '0',
        'p1' => '40',
        'p2' => '60',
        'p3' => '0',
        'p4' => '0',
        'p5' => '0',
        'NotaFinal' => '5',
      ]);

      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '11988601',
        'CodigoComision' => '3',
        'CodigoFacultad' => '8492',
        'año' => '2019',
        'Argumento' => 'Correcto desempeño en lineas generales',
        'n1' => '4.8',
        'n2' => '4.2',
        'n3' => '3.8',
        'n4' => '5',
        'n5' => '4.3',
        'p1' => '20',
        'p2' => '20',
        'p3' => '20',
        'p4' => '20',
        'p5' => '20',
        'NotaFinal' => '4.42',
      ]);

      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '12734361',
        'CodigoComision' => '3',
        'CodigoFacultad' => '8492',
        'año' => '2019',
        'Argumento' => 'Mal desempeño en este periodo',
        'n1' => '0',
        'n2' => '0',
        'n3' => '0',
        'n4' => '1.5',
        'n5' => '4.5',
        'p1' => '0',
        'p2' => '0',
        'p3' => '0',
        'p4' => '80',
        'p5' => '20',
        'NotaFinal' => '2.1',
      ]);

      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '13761987',
        'CodigoComision' => '3',
        'CodigoFacultad' => '8492',
        'año' => '2019',
        'Argumento' => 'Rendimiento muy alto',
        'n1' => '5',
        'n2' => '4',
        'n3' => '4',
        'n4' => '0',
        'n5' => '0',
        'p1' => '50',
        'p2' => '30',
        'p3' => '20',
        'p4' => '0',
        'p5' => '0',
        'NotaFinal' => '4.5',
      ]);

      $evaluacion = Evaluacion::create([
        'RUTAcademico' => '12764362',
        'CodigoComision' => '5',
        'CodigoFacultad' => '8492',
        'año' => '2020',
        'Argumento' => 'Leve descenso en comparacio a lo anterior',
        'n1' => '5',
        'n2' => '5',
        'n3' => '5',
        'n4' => '3.2',
        'n5' => '4.2',
        'p1' => '20',
        'p2' => '20',
        'p3' => '40',
        'p4' => '10',
        'p5' => '10',
        'NotaFinal' => '4.74',
      ]);
    }
}
