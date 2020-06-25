<?php

use Illuminate\Database\Seeder;
use App\secFacultad;

class SecFacultadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $secFacultad = SecFacultad::create([
        'id' => '19126354',
        'CodigoFacultad' => '8492',
      ]);
    }
}
