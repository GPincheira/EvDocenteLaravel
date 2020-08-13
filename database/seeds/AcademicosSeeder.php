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

      $academico = Academico::create([
        'id' => '8651890',
        'verificador' => '2',
        'Nombres' => 'Iván',
        'ApellidoPaterno' => 'Merino',
        'ApellidoMaterno' => 'Rodríguez',
        'TituloProfesional' => 'Ciencia y Tecnología Nuclear',
        'GradoAcademico' => 'Doctor',
        'Categoria' => 'Instructor',
        'HorasContrato' => '27',
        'TipoPlanta' => 'Part-time',
        'CodigoDpto' => '274',
        'CodigoFacultad' => '8492'
      ]);

      $academico = Academico::create([
        'id' => '18777620',
        'verificador' => '7',
        'Nombres' => 'Luis',
        'ApellidoPaterno' => 'Laurens',
        'ApellidoMaterno' => 'Arredondo',
        'TituloProfesional' => 'Ingeniería Mecánica',
        'GradoAcademico' => 'Magister',
        'Categoria' => 'Titular',
        'HorasContrato' => '40',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '101',
        'CodigoFacultad' => '8492'
      ]);

      $academico = Academico::create([
        'id' => '15888219',
        'verificador' => '2',
        'Nombres' => 'Felipe',
        'ApellidoPaterno' => 'Tirado',
        'ApellidoMaterno' => 'Marabolí',
        'TituloProfesional' => 'Ciencias de la Computacion',
        'GradoAcademico' => 'Magister',
        'Categoria' => 'Instructor',
        'HorasContrato' => '33',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '101',
        'CodigoFacultad' => '8492'
      ]);

      $academico = Academico::create([
        'id' => '11988601',
        'verificador' => '1',
        'Nombres' => 'Angélica',
        'ApellidoPaterno' => 'Urrutia',
        'ApellidoMaterno' => 'Sepúlveda',
        'TituloProfesional' => 'Ciencias de la Ingenieria',
        'GradoAcademico' => 'Doctor',
        'Categoria' => 'Titular',
        'HorasContrato' => '28',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '101',
        'CodigoFacultad' => '8492'
      ]);

      $academico = Academico::create([
        'id' => '12734361',
        'verificador' => '2',
        'Nombres' => 'Hugo',
        'ApellidoPaterno' => 'Valdes',
        'ApellidoMaterno' => 'Riquelme',
        'TituloProfesional' => 'Ingeniería de Procesos',
        'GradoAcademico' => 'Doctor',
        'Categoria' => 'Titular',
        'HorasContrato' => '34',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '101',
        'CodigoFacultad' => '8492'
      ]);

      $academico = Academico::create([
        'id' => '13761987',
        'verificador' => '3',
        'Nombres' => 'Ricardo',
        'ApellidoPaterno' => 'Barrientos',
        'ApellidoMaterno' => 'Rojel',
        'TituloProfesional' => 'Ciencias de la Computacion',
        'GradoAcademico' => 'Magister',
        'Categoria' => 'Instructor',
        'HorasContrato' => '44',
        'TipoPlanta' => 'Planta',
        'CodigoDpto' => '101',
        'CodigoFacultad' => '8492'
      ]);
    }
}
