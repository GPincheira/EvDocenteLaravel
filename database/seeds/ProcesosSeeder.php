<?php

use Illuminate\Database\Seeder;
use App\Proceso;

class ProcesosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $proceso = Proceso::create([
        'año' => '2018',
        'fin' => '2019/12/31',
        'Estado' => 'Inactivo'
      ]);

      $proceso = Proceso::create([
        'año' => '2019',
        'fin' => '2019/12/31',
        'Estado' => 'Inactivo'
      ]);

      $proceso = Proceso::create([
        'año' => '2020',
        'fin' => '2019/12/31',
        'Estado' => 'Activo'
      ]);

    }
}
