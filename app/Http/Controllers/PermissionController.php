<?php

namespace App\Http\Controllers;

use App\Models\DescriptionPermisions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PermissionController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:permission.index'],['only'=>['index','listPermissions']]);
    $this->middleware(['permission:permission.create'],['only'=>['create','store']]);
    $this->middleware(['permission:permission.edit'],['only'=>['edit','update']]);
    $this->middleware(['permission:permission.destroy'],['only'=>'destroy']);
  }
    
    public function index()
    {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('permission.index');
    }

    public function create()
    {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('permission.create');
    }

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

    public function edit(Permission $permission)
    {      
      $description = [];
      
      foreach ($permission->descriptions() as $value) {
        $description[] = $value->nombre;
      }

      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('permission.edit',compact('permission','description'));
    }

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
        $f = new Carbon($permission->created_at);
        return $f->format('d-m-Y');
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
