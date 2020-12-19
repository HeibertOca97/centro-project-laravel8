<?php

namespace App\Http\Controllers;

use App\Models\DescriptionPermisions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:permission.index'],['only'=>['index','listPermissions']]);
    $this->middleware(['permission:permission.create'],['only'=>['create','store']]);
    $this->middleware(['permission:permission.edit'],['only'=>['edit','update']]);
    $this->middleware(['permission:permission.destroy'],['only'=>'destroy']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Permission $permission, DescriptionPermisions $description)
    {
        $request->validate([
          'nombre'=>'required:max:190',
          'descripcion'=>'max:190'
        ]);
        $permission->name = $request->nombre;
        
        if($permission->save()){
          $description->nombre = $request->descripcion;
          $description->permission_id = $permission->id;
          $description->save();

          return back()->with("status_success","Nuevo permiso creado");
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
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($permission)
    {
        $permission = Permission::findOrFail($permission);

        $description = [];
        foreach ($permission->descriptions() as $value) {
          $description[] = $value->nombre;
        }

        return view('permission.edit',compact('permission','description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permission)
    {
      $request->validate([
          'nombre'=>'required:max:190',
          'descripcion'=>'max:190'
        ]);

      $permission = Permission::findOrFail($permission);

      $permission->name = $request->nombre;
      
      $description = DescriptionPermisions::findOrFail($permission->id);

      $description->nombre = $request->descripcion;

        if($permission->save() && $description->save()){
          return back()->with("status_success","Permiso actualizado");
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
    public function destroy(Permission $permission)
    {
      $permission->delete();
      
      return back()->with("status_success_delete","El permiso ({$permission->name}) ha sido eliminado");
    }

    public function listPermissions(){
      $permissions = Permission::all();

      return datatables()
      ->of($permissions)
      ->addColumn('created_at', function(Permission $permission){
        return date('d-m-Y', strtotime($permission->created_at));
      })
      ->addColumn('description', function(Permission $permission){
        // Metodo creado - no pertenece a spatie Permission
        $description = $permission->descriptions();
        foreach ($description as $value) {
          return $value->nombre;
        }       
      })
      ->addColumn('btn', 'components.table.actionPermission')
      ->rawColumns(['btn'])
      ->toJson();
    }

}
