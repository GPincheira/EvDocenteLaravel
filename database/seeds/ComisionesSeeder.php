<?php

use Illuminate\Database\Seeder;
use App\comision;

class ComisionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $comision = Comision::create([
        'Año' => '2018',
        'Fecha' => '2018/12/04',
        'CodigoFacultad' => '8492',
        'idSecFacultad' => '19126354',
        'NombreDecano' => 'David Joel',
        'APaternoDecano' => 'Zamora',
        'AMaternoDecano' => 'Barraza',
        'NombreSecFac' => 'Carolina',
        'APaternoSecFac' => 'Contreras',
        'AMaternoSecFac' => 'Jara',
        'Nombre1' => 'Rodrigo',
        'APaterno1' => 'Fuentes',
        'AMaterno1' => 'Campos',
        'Nombre2' => 'Juan Pablo',
        'APaterno2' => 'Rodriguez',
        'AMaterno2' => 'Fernandez',
        'Estado' => 'Activo',
      ]);

      $comision = Comision::create([
        'Año' => '2019',
        'Fecha' => '2019/12/14',
        'CodigoFacultad' => '8492',
        'idSecFacultad' => '19126354',
        'NombreDecano' => 'David Joel',
        'APaternoDecano' => 'Zamora',
        'AMaternoDecano' => 'Barraza',
        'NombreSecFac' => 'Carolina',
        'APaternoSecFac' => 'Contreras',
        'AMaternoSecFac' => 'Jara',
        'Nombre1' => 'Pedro',
        'APaterno1' => 'Fuentes',
        'AMaterno1' => 'Campos',
        'Nombre2' => 'Juan Pablo',
        'APaterno2' => 'Fuentes',
        'AMaterno2' => 'Fuentes',
        'Estado' => 'Activo',
      ]);
    }
}
