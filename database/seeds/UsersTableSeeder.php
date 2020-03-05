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
          'password' => bcrypt('asdfasdf'),
          'Nombre' => 'German',
          'ApellidoPaterno' => 'Pincheira',
          'ApellidoMaterno' => 'Leiva',
          'TipoUsuario' => 'Administrador',
          'Estado' => 'Activo'
        ]);

        $user->assignRole('Administrador');
    }
}
