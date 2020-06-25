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
        'fin' => '2010/12/31',
      ]);

    }
}
