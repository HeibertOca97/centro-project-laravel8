<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DescriptionPermisions;
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
      $up1 = Permission::create(['name' => 'user.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$up1->id]);
      $up2 = Permission::create(['name' => 'user.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$up2->id]);
      $up3 = Permission::create(['name' => 'user.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$up3->id]);
      $up4 = Permission::create(['name' => 'user.show']);
      DescriptionPermisions::create(['nombre'=>'Interfaz que permite ver toda la informacion del usuario creado','permission_id'=>$up4->id]);
      //ACTIONS
      $up5 = Permission::create(['name' => 'user.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$up5->id]);
      
      //PERMISSIONS - ROLES
      //NAVEGACION
      $rp1 = Permission::create(['name' => 'role.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$rp1->id]);
      $rp2 = Permission::create(['name' => 'role.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$rp2->id]);
      $rp3 = Permission::create(['name' => 'role.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$rp3->id]);
      //ACTIONS
      $rp4 = Permission::create(['name' => 'role.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$rp4->id]);
      
      //PERMISSIONS - PERMISSION
      //NAVEGACION
      $p1 = Permission::create(['name' => 'permission.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$p1->id]);
      $p2= Permission::create(['name' => 'permission.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$p2->id]);
      $p3 = Permission::create(['name' => 'permission.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$p3->id]);
      //ACTIONS
      $p4 = Permission::create(['name' => 'permission.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$p4->id]);
     
      //CREATE ROL
      $admin = Role::create(['name'=>'super admin']);
      //ASIGN PERMISSION TO ROL
      $admin->givePermissionTo(Permission::all());
      
      $miembro = Role::create(['name'=>'member']);
      
      $miembro->givePermissionTo(['user.index','user.create','user.edit']);
    }
}
