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
      //Permission list
      Permission::create(['name' => 'academicos.index']);
      Permission::create(['name' => 'academicos.edit']);
      Permission::create(['name' => 'academicos.show']);
      Permission::create(['name' => 'academicos.create']);
      Permission::create(['name' => 'academicos.destroy']);

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

      Permission::create(['name' => 'evaluaciones.index']);
      Permission::create(['name' => 'evaluaciones.edit']);
      Permission::create(['name' => 'evaluaciones.show']);
      Permission::create(['name' => 'evaluaciones.create']);
      Permission::create(['name' => 'evaluaciones.destroy']);

      Permission::create(['name' => 'facultades.index']);
      Permission::create(['name' => 'facultades.edit']);
      Permission::create(['name' => 'facultades.show']);
      Permission::create(['name' => 'facultades.create']);
      Permission::create(['name' => 'facultades.destroy']);

      Permission::create(['name' => 'users.index']);
      Permission::create(['name' => 'users.edit']);
      Permission::create(['name' => 'users.show']);
      Permission::create(['name' => 'users.create']);
      Permission::create(['name' => 'users.destroy']);

      $Administrador = Role::create(['name' => 'Administrador']);
      $Administrador->givePermissionTo([
          'academicos.index',
          'academicos.show',
          'academicos.create',
          'comisiones.index',
          'comisiones.show',
          'departamentos.index',
          'departamentos.edit',
          'departamentos.show',
          'departamentos.create',
          'departamentos.destroy',
          'evaluaciones.index',
          'evaluaciones.show',
          'facultades.index',
          'facultades.edit',
          'facultades.show',
          'facultades.create',
          'facultades.destroy',
          'users.index',
          'users.edit',
          'users.show',
          'users.create',
          'users.destroy',
      ]);

      $SecFacultad = Role::create(['name' => 'SecFacultad']);
      $SecFacultad->givePermissionTo([
          'academicos.index',
          'academicos.edit',
          'academicos.show',
          'academicos.create',
          'academicos.destroy',
          'comisiones.index',
          'comisiones.show',
          'comisiones.create',
          'evaluaciones.index',
          'evaluaciones.edit',
          'evaluaciones.show',
          'evaluaciones.create',
          'evaluaciones.destroy',
      ]);

      $Secretario = Role::create(['name' => 'Secretario']);
      $Secretario->givePermissionTo([
          'evaluaciones.index',
          'evaluaciones.show',
      ]);
    }
}
