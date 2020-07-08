<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
          'id' => '19387547',
          'verificador' => '5',
        	'email' => 'admin@gmail.com',
          'password' => bcrypt('12345678'),
          'Nombre' => 'German',
          'ApellidoPaterno' => 'Pincheira',
          'ApellidoMaterno' => 'Leiva',
          'Rol' => 'Administrador'
        ]);
        $user->assignRole('Administrador');

        $user = User::create([
          'id' => '14555555',
          'verificador' => '8',
        	'email' => 'admin2@gmail.com',
          'password' => bcrypt('12345678'),
          'Nombre' => 'Fabiola',
          'ApellidoPaterno' => 'Leiva',
          'ApellidoMaterno' => 'Caceres',
          'Rol' => 'Administrador'
        ]);
        $user->assignRole('Administrador');

        $user = User::create([
          'id' => '19126354',
          'verificador' => '5',
        	'email' => 'carolina@hotmail.com',
          'password' => bcrypt('12345678'),
          'Nombre' => 'Carolina Alejandra',
          'ApellidoPaterno' => 'Contreras',
          'ApellidoMaterno' => 'Jara',
          'Rol' => 'SecFacultad'
        ]);
        $user->assignRole('SecFacultad');

        $user = User::create([
          'id' => '9999999',
          'verificador' => '9',
        	'email' => 'secre@gmail.com',
          'password' => bcrypt('12345678'),
          'Nombre' => 'Prueba',
          'ApellidoPaterno' => 'Secretaria',
          'ApellidoMaterno' => '',
          'Rol' => 'Secretaria'
        ]);
        $user->assignRole('Secretario');
    }
}
