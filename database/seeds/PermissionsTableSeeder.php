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
      Permission::create(['name' => 'facultades.index']);
      Permission::create(['name' => 'facultades.edit']);
      Permission::create(['name' => 'facultades.show']);
      Permission::create(['name' => 'facultades.create']);
      Permission::create(['name' => 'facultades.destroy']);

      $Administrador = Role::create(['name' => 'Administrador']);
      $Administrador->givePermissionTo([
          'facultades.index',
          'facultades.edit',
          'facultades.show',
          'facultades.create',
          'facultades.destroy'
      ]);

      $SecFacultad = Role::create(['name' => 'SecFacultad']);
      $SecFacultad->givePermissionTo([
      ]);
      //$admin->givePermissionTo('products.index');
      //$admin->givePermissionTo(Permission::all());

      //Guest
      $Secretario = Role::create(['name' => 'Secretario']);
      $Secretario->givePermissionTo([
          'facultades.index',
          'facultades.show'
      ]);
    }
}
