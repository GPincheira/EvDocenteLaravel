<?php

use Illuminate\Database\Seeder;
use App\facultad;

class FacultadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facultad = Facultad::create([
          'id' => '8492',
        	'Nombre' => 'Facultad de Ciencias de la Ingenieria',
          'DecanoNombre' => 'David Joel',
          'DecanoAPaterno' => 'Zamora',
          'DecanoAMaterno' => 'Barraza'
        ]);

        $facultad = Facultad::create([
          'id' => '3826',
        	'Nombre' => 'Facultad de Medicina',
          'DecanoNombre' => 'Raul',
          'DecanoAPaterno' => 'Silva',
          'DecanoAMaterno' => 'Prado'
        ]);

        $facultad = Facultad::create([
          'id' => '1836',
        	'Nombre' => 'Facultad de Ciencias de la Salud',
          'DecanoNombre' => 'Sara',
          'DecanoAPaterno' => 'Herrera',
          'DecanoAMaterno' => 'Leyton'
        ]);

        $facultad = Facultad::create([
          'id' => '9506',
        	'Nombre' => 'Facultad de Ciencias Basicas',
          'DecanoNombre' => 'Victor Hugo',
          'DecanoAPaterno' => 'Monzon',
          'DecanoAMaterno' => 'Godoy'
        ]);

        $facultad = Facultad::create([
          'id' => '2431',
        	'Nombre' => 'Facultad de Ciencias Sociales y Economicas',
          'DecanoNombre' => 'Patricio',
          'DecanoAPaterno' => 'Oliva',
          'DecanoAMaterno' => 'Lagos'
        ]);

        $facultad = Facultad::create([
          'id' => '1916',
        	'Nombre' => 'Facultad de Ciencias de la Educacion',
          'DecanoNombre' => 'Rodrigo',
          'DecanoAPaterno' => 'Vargas',
          'DecanoAMaterno' => 'Vitoria'
        ]);
    }
}
