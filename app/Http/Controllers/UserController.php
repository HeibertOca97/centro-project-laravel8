<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserEditAllRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use App\Models\helpers\ConvertToDate;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterUserMailable;
use Illuminate\Support\Str;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:user.index'],['only'=>['index','listAllUsers','listAllUsersExceptToAdmin']]);
    $this->middleware(['permission:user.create'],['only'=>['create','store']]);
    $this->middleware(['permission:user.edit'],['only'=>['edit','update','editListAll','updateAll']]);
    $this->middleware(['permission:user.destroy'],['only'=>'destroy']);
  }
    
    public function index()
    {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('user.index');
    }

    public function create()
    {
      $roles = Role::all()->pluck('name','id');

      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('user.create',compact('roles'));        
    }

    public function store(UserCreateRequest $request,User $user)
    {
      $user->username = $request->username;
      $user->email = $request->email;
      $user->status = $request->estado;
      $user->password = Hash::make($request->password);
      if(!$user->nombres && !$user->apellidos){
        $user->slug = Str::slug($request->username,'-');
      }
      
      $user->assignRole($request->rol);

      if($user->save()){
        Mail::to($request->email)->send(new RegisterUserMailable($request->username,$request->password));
        return back()->with("status_success","Nuevo usuario creado");
      }
    }

    public function show(User $user)
    {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('user.show',compact('user'));
    }

    public function edit(User $user)
    {
      $roles = Role::all()->pluck('name','id')->toArray();
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('user.edit',compact('roles','user'));  
    }

    public function editListAll(User $user)
    {      
      $roles = Role::all()->pluck('name','id')->toArray();
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('user.editList',compact('roles','user'));  
    }

    public function update(UserEditRequest $request, User $user)
    {
      $user->username = $request->username;
      $user->email = $request->email;
      $user->status = $request->estado;
      if(!$user->nombres && !$user->apellidos){
        $user->slug = Str::slug($request->username,'-');
      }
      
      if($request->password){
        $request->validate(['password'=>'min:8|max:15']);
        $user->password = Hash::make($request->password);
      }
      
      $user->syncRoles($request->rol);

      if($user->save()){
        return redirect()->route('users.edit',$user)->with("status_success","Datos del usuario actualizado");
      }
    }

    public function updateAll(UserEditAllRequest $request, User $user)
    {
      $user->cedula = $request->cedula;
      $user->nombres = $request->nombres;
      $user->apellidos = $request->apellidos;
      $user->cargo = $request->cargo;
      $user->username = $request->username;
      $user->email = $request->email;
      $user->status = $request->estado;
      if(!$user->nombres && !$user->apellidos){
        $slug = "{$request->username}";
        $user->slug = Str::slug("{$slug}",'-');
      }else{
        $slug = "{$request->nombres} {$request->apellidos}";
        $user->slug = Str::slug("{$slug}",'-');
      }
      
      if($request->password){
        $request->validate(['password'=>'min:8|max:15']);
        $user->password = Hash::make($request->password);
      }
      
      $user->syncRoles($request->rol);

      if($user->save()){
        return redirect()->route('users.editAll',$user)->with("status_success","Datos del usuario actualizado");
      }
    }

    public function destroy(User $user)
    {
      foreach ($user->getRoleNames() as $value) {
        $user->removeRole($value);
      }

      //existe imagen
      if($user->avatar){
        //cambio de public a storage
        $url_public = str_replace('storage','public',$user->avatar);
        //Eliminar imagen anterior
        Storage::delete($url_public);
      }

      $user->delete();
      
      return back()->with("status_success_delete","El usuario ({$user->username}) ha sido eliminado");
      
    }

    public function listAllUsers(){
      $users = User::select('id','email','status','slug','created_at')->get();

      return datatables()
      ->of($users)
      ->addColumn('created_at', function(User $user){
        return ConvertToDate::transformDateGetNewDate($user->created_at);
      })
      ->addColumn('rol', function(User $user){
        foreach ($user->getRoleNames() as $rol) {
         return $rol;
        }
      })
      ->addColumn('permisos', function(User $user){
        return $user->getPermissionsViaRoles();
      })
      ->addColumn('status', function(User $user){
        if($user->status == 1){
          return '<span class="badge badge-success">Activo</span>';
        }
        return '<span class="badge badge-danger">Inactivo</span>';
      })
      ->addColumn('btn', 'components.table.actionUser')
      ->rawColumns(['status','btn'])
      ->toJson();
    }

    public function listAllUsersExceptToAdmin(){
      $users = User::select('id','email','status','slug','created_at')->join('model_has_roles','users.id','=','model_has_roles.model_id')->where('role_id','!=',1)->get();

      return datatables()
      ->of($users)
      ->addColumn('created_at', function(User $user){
        return ConvertToDate::transformDateGetNewDate($user->created_at);
      })
      ->addColumn('rol', function(User $user){
        foreach ($user->getRoleNames() as $rol) {
         return $rol;
        }
      })
      ->addColumn('permisos', function(User $user){
        return $user->getPermissionsViaRoles();
      })
      ->addColumn('status', function(User $user){
        if($user->status == 1){
          return '<span class="badge badge-success">Activo</span>';
        }
        return '<span class="badge badge-danger">Inactivo</span>';
      })
      ->addColumn('btn', 'components.table.actionUser')
      ->rawColumns(['status','btn'])
      ->toJson();  
    }

}
