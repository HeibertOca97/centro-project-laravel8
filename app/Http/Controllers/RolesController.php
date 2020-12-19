<?php

namespace App\Http\Controllers;

use App\Models\DescriptionPermisions;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:role.index'],['only'=>['index','listRoles']]);
    $this->middleware(['permission:role.create'],['only'=>['create','store']]);
    $this->middleware(['permission:role.edit'],['only'=>['edit','update']]);
    $this->middleware(['permission:role.destroy'],['only'=>'destroy']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permissions = Permission::all();
      return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
      $permission = $role->getPermissionNames()->toArray();
      $permissions = Permission::all();
      return view('roles.edit',compact('role','permission','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return date('d-m-Y', strtotime($roles->created_at));
      })
      ->addColumn('permissions', function(Role $roles){
        return $roles->getPermissionNames();
      })
      ->addColumn('btn', 'components.table.actionRol')
      ->rawColumns(['btn'])
      ->toJson();
    }
}
