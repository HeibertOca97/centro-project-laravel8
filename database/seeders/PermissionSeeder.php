<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
      app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

      //PERMISSIONS - USERS
      //NAVEGACION
      Permission::create(['name' => 'user.index']);
      Permission::create(['name' => 'user.create']);
      Permission::create(['name' => 'user.show']);
      Permission::create(['name' => 'user.edit']);
      //ACTIONS
      Permission::create(['name' => 'user.store']);
      Permission::create(['name' => 'user.update']);
      Permission::create(['name' => 'user.destroy']);
      
      //PERMISSIONS - ROLES
      //NAVEGACION
      Permission::create(['name' => 'role.index']);
      Permission::create(['name' => 'role.create']);
      Permission::create(['name' => 'role.show']);
      Permission::create(['name' => 'role.edit']);
      //ACTIONS
      Permission::create(['name' => 'role.store']);
      Permission::create(['name' => 'role.update']);
      Permission::create(['name' => 'role.destroy']);
      
      //PERMISSIONS - PERMISSION
      //NAVEGACION
      Permission::create(['name' => 'permission.index']);
      Permission::create(['name' => 'permission.create']);
      Permission::create(['name' => 'permission.show']);
      Permission::create(['name' => 'permission.edit']);
      //ACTIONS
      Permission::create(['name' => 'permission.store']);
      Permission::create(['name' => 'permission.update']);
      Permission::create(['name' => 'permission.destroy']);
     
      //CREATE ROL
      $admin = Role::create(['name'=>'super admin']);
      //ASIGN PERMISSION TO ROL
      $admin->givePermissionTo(Permission::all());
    }
}
