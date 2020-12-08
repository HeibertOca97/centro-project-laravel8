<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
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
      $user->status = $request->status;
      $user->password = Hash::make($request->password);

      if($user->save()){
        if($request->rol){
          $user->assignRole($request->rol);
        }
        return back()->with("status_success","Nuevo usuario creado");
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(User $user)
    // {
    //     return $user;
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      // return $user;
      $roles = Role::all()->pluck('name','id');
      return view('user.edit',compact('roles','user'));  
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
      $user->status = $request->status;
      
      if($request->password){
        $user->password = Hash::make($request->password);
      }

      if($user->save()){
        if($request->rol){
          $user->assignRole($request->rol);
        }
        return back()->with("status_success","Datos del usuario actualizado");
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
      $user = User::findOrFail($user);
        //eliminar rol
      foreach ($user->getRoleNames() as $value) {
        $user->removeRole($value);
      }

      if ($user->delete()) {
        return back()->with("status_success","El usuario ({$user->username}) ha sido eliminado");
      }
    }

    public function listUsers(){
      $users = User::all();
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
        return $user->getAllPermissions();
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

    public function cerrar(){
      if (Auth::check()) {
        // return "Logeada";
      Auth::logout();
      return redirect()->route('login');
      }
    }

}
