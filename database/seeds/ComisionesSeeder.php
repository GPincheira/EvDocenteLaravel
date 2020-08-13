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
        'Año' => '2017',
        'Fecha' => '2017/12/04',
        'CodigoFacultad' => '8492',
        'idSecFacultad' => '19126354',
        'NombreDecano' => 'David Joel',
        'APaternoDecano' => 'Zamora',
        'AMaternoDecano' => 'Barraza',
        'NombreSecFac' => 'Carolina',
        'APaternoSecFac' => 'Contreras',
        'AMaternoSecFac' => 'Jara',
        'Nombre1' => 'Carlos Jose',
        'APaterno1' => 'Rodriguez',
        'AMaterno1' => 'Delgado',
        'Nombre2' => 'Cristian',
        'APaterno2' => 'Lara',
        'AMaterno2' => 'Pavez',
        'Estado' => 'Activo',
      ]);

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
        'Nombre1' => 'Olga',
        'APaterno1' => 'Aravena',
        'AMaterno1' => 'Sanchez',
        'Nombre2' => 'Juan Pablo',
        'APaterno2' => 'Fuentes',
        'AMaterno2' => 'Fuentes',
        'Estado' => 'Inactivo',
      ]);

      $comision = Comision::create([
        'Año' => '2020',
        'Fecha' => '2020/08/14',
        'CodigoFacultad' => '8492',
        'idSecFacultad' => '19126354',
        'NombreDecano' => 'David Joel',
        'APaternoDecano' => 'Zamora',
        'AMaternoDecano' => 'Barraza',
        'NombreSecFac' => 'Carolina',
        'APaternoSecFac' => 'Contreras',
        'AMaternoSecFac' => 'Jara',
        'Nombre1' => 'Cristian',
        'APaterno1' => 'Tello',
        'AMaterno1' => 'Campos',
        'Nombre2' => 'Jose',
        'APaterno2' => 'Fernandez',
        'AMaterno2' => 'Soto',
        'Estado' => 'Activo',
      ]);
    }
}
