<?php

namespace App\Http\Controllers;

use App\Models\DescriptionPermisions;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RolesController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:role.index'],['only'=>['index','listRoles']]);
    $this->middleware(['permission:role.create'],['only'=>['create','store']]);
    $this->middleware(['permission:role.edit'],['only'=>['edit','update']]);
    $this->middleware(['permission:role.destroy'],['only'=>'destroy']);
  }

    public function index()
    {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('roles.index');
    }

    public function create()
    {
      $permissions = Permission::all();

      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('roles.create',compact('permissions'));
    }

    public function store(Request $request, Role $role)
    {
      $request->validate([
        'nombre'=>'required|max:191'
      ]);

      $role->name = $request->nombre;

      if($role->save()){
        $role->syncPermissions($request->permission);
        return back()->with("status_success","Nuevo rol creado");
      }else{
        return back()->with('status_error','Ha ocurrido un error con la peticion');
      }
    }

    public function edit(Role $role)
    {      
      $permission = $role->getPermissionNames()->toArray();
      $permissions = Permission::all();

      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('roles.edit',compact('role','permission','permissions'));
    }

    public function update(Request $request, Role $role)
    {
      $request->validate([
        'nombre'=>'required|max:191'
      ]);

      $role->name = $request->nombre;

      if($role->save()){
        $role->syncPermissions($request->permission);
        return back()->with("status_success","Rol actualizado");
      }else{
        return back()->with('status_error','Ha ocurrido un error con la peticion');
      }
    }

    public function destroy(Role $role)
    {
      $role->revokePermissionTo($role->getPermissionNames()->toArray());

      $role->delete();

      return back()->with("status_success_delete","El rol ({$role->name}) ha sido eliminado");
    }

    public function listRoles(){
      $roles = Role::all();

      return datatables()
      ->of($roles)
      ->addColumn('created_at', function(Role $roles){
        $f = new Carbon($roles->created_at);
        return $f->format('d-m-Y');
      })
      ->addColumn('permissions', function(Role $roles){
        return $roles->getPermissionNames();
      })
      ->addColumn('btn', 'components.table.actionRol')
      ->rawColumns(['btn'])
      ->toJson();
    }
    
}
