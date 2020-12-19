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
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:user.index'],['only'=>['index','listUsers']]);
    $this->middleware(['permission:user.create'],['only'=>['create','store']]);
    $this->middleware(['permission:user.edit'],['only'=>['edit','update','editListAll','updateAll']]);
    $this->middleware(['permission:user.destroy'],['only'=>'destroy']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->status != 1){
        Auth::logout();
        return redirect()->route('login')->with('status','Su cuenta se encuentra inactiva, para mayor informacion comunicarse con el administrador.');
      }
      return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all()->pluck('name','id');
      return view('user.create',compact('roles'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request,User $user)
    {
      $user->username = $request->username;
      $user->email = $request->email;
      $user->status = $request->estado;
      $user->password = Hash::make($request->password);
      
      $user->assignRole($request->rol);

      if($user->save()){
        return back()->with("status_success","Nuevo usuario creado");
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $roles = Role::all()->pluck('name','id')->toArray();
      return view('user.edit',compact('roles','user'));  
    }

    public function editListAll(User $user)
    {
      $roles = Role::all()->pluck('name','id')->toArray();
      return view('user.editList',compact('roles','user'));  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
      $user->username = $request->username;
      $user->email = $request->email;
      $user->status = $request->estado;
      
      if($request->password){
        $request->validate(['password'=>'min:8|max:15']);
        $user->password = Hash::make($request->password);
      }
      
      $user->syncRoles($request->rol);

      if($user->save()){
        return back()->with("status_success","Datos del usuario actualizado");
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
      
      if($request->password){
        $request->validate(['password'=>'min:8|max:15']);
        $user->password = Hash::make($request->password);
      }
      
      $user->syncRoles($request->rol);

      if($user->save()){
        return back()->with("status_success","Datos del usuario actualizado");
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      foreach ($user->getRoleNames() as $value) {
        $user->removeRole($value);
      }

      $user->delete();
      
      return back()->with("status_success_delete","El usuario ({$user->username}) ha sido eliminado");
      
    }

    public function listUsers(){
      $users = User::select('id','email','status','created_at')->get();
      return datatables()
      ->of($users)
      ->addColumn('created_at', function(User $user){
        return date('d-m-Y', strtotime($user->created_at));
      })
      ->addColumn('rol', function(User $user){
        foreach ($user->getRoleNames() as $rol) {
         return $rol;
        }
      })
      ->addColumn('permisos', function(User $user){
        return $user->getPermissionsViaRoles();
        // return $user->getAllPermissions();
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
