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
    }
}
