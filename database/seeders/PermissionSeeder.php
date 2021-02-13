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
      $p = Permission::create(['name' => 'user.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'user.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'user.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'user.show']);
      DescriptionPermisions::create(['nombre'=>'Interfaz que permite ver toda la informacion del usuario creado','permission_id'=>$p->id]);
      //ACTIONS
      $p = Permission::create(['name' => 'user.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$p->id]);
      
      //PERMISSIONS - ROLES
      //NAVEGACION
      $p = Permission::create(['name' => 'role.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'role.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'role.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$p->id]);
      //ACTIONS
      $p = Permission::create(['name' => 'role.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$p->id]);
      
      //PERMISSIONS - PERMISSION
      //NAVEGACION
      $p = Permission::create(['name' => 'permission.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$p->id]);
      $p= Permission::create(['name' => 'permission.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'permission.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$p->id]);
      //ACTIONS
      $p = Permission::create(['name' => 'permission.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$p->id]);

      //PERMISSIONS - PLAN TRABAJO
      //NAVEGACION
      $p = Permission::create(['name' => 'plantrabajo.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$p->id]);
      $p= Permission::create(['name' => 'plantrabajo.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'plantrabajo.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$p->id]);
      //ACTIONS
      $p = Permission::create(['name' => 'plantrabajo.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'plantrabajo.download']);
      DescriptionPermisions::create(['nombre'=>'Accion para descargar y/o exportar los datos de este modulo','permission_id'=>$p->id]);

      //PERMISSIONS - ACTIVIDADES
      //NAVEGACION
      $p = Permission::create(['name' => 'Activities.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$p->id]);
      $p= Permission::create(['name' => 'Activities.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'Activities.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$p->id]);
      //ACTIONS
      $p = Permission::create(['name' => 'Activities.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'Activities.download']);
      DescriptionPermisions::create(['nombre'=>'Accion para descargar y/o exportar los datos de este modulo','permission_id'=>$p->id]);
      
      //PERMISSIONS - MIS ACTIVIDADES
      $p = Permission::create(['name' => 'MyActivitie.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$p->id]);
      $p= Permission::create(['name' => 'MyActivitie.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'MyActivitie.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'MyActivitie.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$p->id]);

      //PERMISSIONS - EMPRENDEDORES
      $p = Permission::create(['name' => 'emprendedor.index']);
      DescriptionPermisions::create(['nombre'=>'Interfaz principal del modulo','permission_id'=>$p->id]);
      $p= Permission::create(['name' => 'emprendedor.create']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para crear','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'emprendedor.edit']);
      DescriptionPermisions::create(['nombre'=>'Interfaz y accion para editar','permission_id'=>$p->id]);
      $p = Permission::create(['name' => 'emprendedor.destroy']);
      DescriptionPermisions::create(['nombre'=>'Accion para eliminar','permission_id'=>$p->id]);
     
      //CREATE ROL
      $admin = Role::create(['name'=>'super admin']);
      //ASIGN PERMISSION TO ROL
      $admin->givePermissionTo(Permission::all());
      
      $miembro = Role::create(['name'=>'member']);
      
      $miembro->givePermissionTo(['MyActivitie.index','MyActivitie.create','MyActivitie.edit','MyActivitie.destroy']);
    }
}
