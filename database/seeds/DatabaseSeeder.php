<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seeders que serán efecutados, en el orden correspondiente
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FacultadesSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(AcademicosSeeder::class);
        $this->call(SecFacultadesSeeder::class);
        $this->call(ComisionesSeeder::class);
        $this->call(EvaluacionesSeeder::class);
        $this->call(ProcesosSeeder::class);
    }
}
