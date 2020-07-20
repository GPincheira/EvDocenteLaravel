<?php

use Illuminate\Database\Seeder;
use App\academico;

class AcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $academico = Academico::create([
        'id' => '13757443',
        'verificador' => '2',
        'Nombres' => 'Leonor',
        'ApellidoPaterno' => 'Cerda',
        'ApellidoMaterno' => 'Diaz',
        'TituloProfesional' => 'Pedagogia en Ciencias',
        'GradoAcademico' => 'Magister',
        'Categoria' => 'Titular',
        'HorasContrato' => '35',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '582',
        'CodigoFacultad' => '1916'
      ]);

      $academico = Academico::create([
        'id' => '17888251',
        'verificador' => '5',
        'Nombres' => 'Veronica',
        'ApellidoPaterno' => 'Guerra',
        'ApellidoMaterno' => 'Guerrero',
        'TituloProfesional' => 'Enfermera',
        'GradoAcademico' => 'Doctor',
        'Categoria' => 'Adjunto',
        'HorasContrato' => '25',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '284',
        'CodigoFacultad' => '1836'
      ]);

      $academico = Academico::create([
        'id' => '9657251',
        'verificador' => '1',
        'Nombres' => 'Carlos',
        'ApellidoPaterno' => 'Rojas',
        'ApellidoMaterno' => 'Palacios',
        'TituloProfesional' => 'Gestion de Operaciones',
        'GradoAcademico' => 'Magister',
        'Categoria' => 'Titular',
        'HorasContrato' => '24',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '274',
        'CodigoFacultad' => '8492'
      ]);

      $academico = Academico::create([
        'id' => '10752674',
        'verificador' => '9',
        'Nombres' => 'Christian',
        'ApellidoPaterno' => 'Correa',
        'ApellidoMaterno' => '',
        'TituloProfesional' => 'Ingenieria Civil',
        'GradoAcademico' => 'Doctor',
        'Categoria' => 'Adjunto',
        'HorasContrato' => '20',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '274',
        'CodigoFacultad' => '8492'
      ]);

      $academico = Academico::create([
        'id' => '12764362',
        'verificador' => '6',
        'Nombres' => 'Mary Carmen',
        'ApellidoPaterno' => 'Jarur',
        'ApellidoMaterno' => 'Muñoz',
        'TituloProfesional' => 'Ciencias de la Computacion',
        'GradoAcademico' => 'Magister',
        'Categoria' => 'Instructor',
        'HorasContrato' => '40',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '101',
        'CodigoFacultad' => '8492'
      ]);
    }
}
