<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Lista de permisos, las que se guardan en una tabla de la BD
      Permission::create(['name' => 'academicos.index']);
      Permission::create(['name' => 'academicos.edit']);
      Permission::create(['name' => 'academicos.show']);
      Permission::create(['name' => 'academicos.create']);
      Permission::create(['name' => 'academicos.destroy']);
      Permission::create(['name' => 'academicos.reactivar']);

      Permission::create(['name' => 'comisiones.index']);
      Permission::create(['name' => 'comisiones.edit']);
      Permission::create(['name' => 'comisiones.show']);
      Permission::create(['name' => 'comisiones.create']);
      Permission::create(['name' => 'comisiones.destroy']);

      Permission::create(['name' => 'departamentos.index']);
      Permission::create(['name' => 'departamentos.edit']);
      Permission::create(['name' => 'departamentos.show']);
      Permission::create(['name' => 'departamentos.create']);
      Permission::create(['name' => 'departamentos.destroy']);
      Permission::create(['name' => 'departamentos.reactivar']);

      Permission::create(['name' => 'evaluaciones.index']);
      Permission::create(['name' => 'evaluaciones.index2']);
      Permission::create(['name' => 'evaluaciones.edit']);
      Permission::create(['name' => 'evaluaciones.show']);
      Permission::create(['name' => 'evaluaciones.create']);
      Permission::create(['name' => 'evaluaciones.destroy']);
      Permission::create(['name' => 'evaluaciones.reactivar']);
      Permission::create(['name' => 'evaluaciones.pdf']);

      Permission::create(['name' => 'facultades.index']);
      Permission::create(['name' => 'facultades.edit']);
      Permission::create(['name' => 'facultades.show']);
      Permission::create(['name' => 'facultades.create']);
      Permission::create(['name' => 'facultades.destroy']);
      Permission::create(['name' => 'facultades.reactivar']);

      Permission::create(['name' => 'Users.index']);
      Permission::create(['name' => 'Users.index2']);
      Permission::create(['name' => 'Users.index3']);
      Permission::create(['name' => 'Users.edit']);
      Permission::create(['name' => 'Users.show']);
      Permission::create(['name' => 'Users.create']);
      Permission::create(['name' => 'Users.create2']);
      Permission::create(['name' => 'Users.create3']);
      Permission::create(['name' => 'Users.destroy']);
      Permission::create(['name' => 'Users.reactivar']);

      //Creacion de los 3 tipos de roles, y se le asigna los permisos correspondientes a cada uno
      $Administrador = Role::create(['name' => 'Administrador']);
      $Administrador->givePermissionTo([
          'academicos.index',
          'academicos.edit',
          'academicos.show',
          'comisiones.index',
          'comisiones.show',
          'departamentos.index',
          'departamentos.edit',
          'departamentos.show',
          'departamentos.create',
          'departamentos.destroy',
          'departamentos.reactivar',
          'evaluaciones.index',
          'evaluaciones.show',
          'evaluaciones.pdf',
          'facultades.index',
          'facultades.edit',
          'facultades.show',
          'facultades.create',
          'facultades.destroy',
          'facultades.reactivar',
          'Users.index',
          'Users.index2',
          'Users.index3',
          'Users.edit',
          'Users.show',
          'Users.create',
          'Users.create2',
          'Users.create3',
          'Users.destroy',
          'Users.reactivar',
      ]);

      $SecFacultad = Role::create(['name' => 'SecFacultad']);
      $SecFacultad->givePermissionTo([
          'academicos.index',
          'academicos.edit',
          'academicos.show',
          'academicos.create',
          'academicos.destroy',
          'academicos.reactivar',
          'comisiones.index',
          'comisiones.show',
          'comisiones.create',
          'evaluaciones.index',
          'evaluaciones.edit',
          'evaluaciones.show',
          'evaluaciones.create',
          'evaluaciones.destroy',
          'evaluaciones.reactivar',
          'evaluaciones.pdf',
      ]);

      $Secretario = Role::create(['name' => 'Secretario']);
      $Secretario->givePermissionTo([
          'evaluaciones.index',
          'evaluaciones.index2',
          'evaluaciones.show',
          'evaluaciones.pdf',
      ]);
    }
}
