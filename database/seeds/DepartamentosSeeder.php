<?php

use Illuminate\Database\Seeder;
use App\departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $departamento = Departamento::create([
        'id' => '101',
        'Nombre' => 'Departamento de Computación e Industrias',
        'CodigoFacultad' => '8492'
      ]);

      $departamento = Departamento::create([
        'id' => '274',
        'Nombre' => 'Departamento de Obras Civiles',
        'CodigoFacultad' => '8492'
      ]);

      $departamento = Departamento::create([
        'id' => '675',
        'Nombre' => 'Departamento de Ciencias Sociales',
        'CodigoFacultad' => '2431'
      ]);

      $departamento = Departamento::create([
        'id' => '989',
        'Nombre' => 'Departamento de Economía y Administración',
        'CodigoFacultad' => '2431'
      ]);

      $departamento = Departamento::create([
        'id' => '687',
        'Nombre' => ' Departamento de Ciencias Preclínicas',
        'CodigoFacultad' => '3826'
      ]);

      $departamento = Departamento::create([
        'id' => '941',
        'Nombre' => 'Departamento de Ciencias Clínicas',
        'CodigoFacultad' => '3826'
      ]);

      $departamento = Departamento::create([
        'id' => '284',
        'Nombre' => 'Departamento de Enfermeria',
        'CodigoFacultad' => '1836'
      ]);

      $departamento = Departamento::create([
        'id' => '857',
        'Nombre' => 'Departamento de Kinesiologia',
        'CodigoFacultad' => '1836'
      ]);

      $departamento = Departamento::create([
        'id' => '940',
        'Nombre' => 'Departamento de Psicologia',
        'CodigoFacultad' => '1836'
      ]);

      $departamento = Departamento::create([
        'id' => '582',
        'Nombre' => 'Departamento de Formación Inicial Escolar',
        'CodigoFacultad' => '1916'
      ]);

      $departamento = Departamento::create([
        'id' => '729',
        'Nombre' => 'Departamento de Lengua Castellana y Literatura',
        'CodigoFacultad' => '1916'
      ]);

      $departamento = Departamento::create([
        'id' => '785',
        'Nombre' => 'Departamento de Diversidad e Inclusividad Educativa',
        'CodigoFacultad' => '1916'
      ]);

      $departamento = Departamento::create([
        'id' => '216',
        'Nombre' => 'Departamento de Ciencias de la Actividad Física',
        'CodigoFacultad' => '1916'
      ]);

      $departamento = Departamento::create([
        'id' => '540',
        'Nombre' => 'Departamento de Idiomas',
        'CodigoFacultad' => '1916'
      ]);

      $departamento = Departamento::create([
        'id' => '667',
        'Nombre' => 'Departamento de Fundamentos de la Educacion',
        'CodigoFacultad' => '1916'
      ]);
    }
}
