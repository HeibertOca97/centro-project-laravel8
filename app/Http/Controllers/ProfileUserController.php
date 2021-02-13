<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilPasswordRequest;
use App\Http\Requests\PerfilUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileUserController extends Controller
{
  public function index()
  {      
    $user = Auth::user();
  
    return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('user.profile.index',compact('user'));
  }
  
  public function editPassword()
  {
    $user = Auth::user();
  
    return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('user.profile.password',compact('user'));
  }
  
  public function update(PerfilUpdateRequest $request, User $user)
  {
    $user->cedula = $request->cedula;
    $user->nombres = $request->nombres;
    $user->apellidos = $request->apellidos;
    $user->cargo = $request->cargo;
    $user->username = $request->username;
    $user->email = $request->email;

    if(!$user->nombres && !$user->apellidos){
      $slug = "{$request->username}";
      $user->slug = Str::slug("{$slug}",'-');
    }else{
      $slug = "{$request->nombres} {$request->apellidos}";
      $user->slug = Str::slug("{$slug}",'-');
    }
  
    if ($user->save()) {
      return back()->with("status_success","Su informacion ha sido actualizada");
    }
  
  }
  
  public function updatePassword(PerfilPasswordRequest $request, User $user){
    if(Hash::check($request->contraseñaActual, $user->password)){
      $user->password = bcrypt($request->contraseñaNueva);
      if($user->save()){
        return back()->with("status_success","Contraseña actualizada");
      }
    }else{
      return back()->with(['status_error'=>'Contraseña incorrecta','password'=>$request->contraseñaActual]);
    }
  }
  
  public function updateImage(Request $request, User $user)
  {
    $request->validate([
      'imagen'=>'required|image|max:2048'
    ]);  
  
    $user = $user::findOrFail(Auth::user()->id);
    
    //validamos que aya imagen
    if($user->avatar){
      //cambio de public a storage
      $url_public = str_replace('storage','public',$user->avatar);
      //Eliminar imagen anterior
      Storage::delete($url_public);
    }
  
    //cambio de storage a public y lo almacenamos
    $url = $request->file('imagen')->store('public/image');
    $url = Storage::url($url);
  
    //asigamos la nueva ruta de imagen
    $user->avatar = $url;
    $user->save();
    return redirect()->back();
  }
  
  public function removeImage(User $user)
  {
    $user = $user::findOrFail(Auth::user()->id);
    
    if($user->avatar){
      $url_public = str_replace('storage','public',$user->avatar);
      $user->avatar = '';
      Storage::delete($url_public);
  
      $user->save();
    }
    
    return redirect()->back();
  }

  public function validatedUserDataUnique(Request $request)
  {
    switch ($request->column) {
      case 'cedula':
        $res = User::validatedRequestData($request->action,$request->column,$request->cedula,Auth::user()->cedula);
        return response()->json(['res'=>$res]);
        break;
      case 'username':
        $res = User::validatedRequestData($request->action,$request->column,$request->username,Auth::user()->username);
        return response()->json(['res'=>$res]);
        break;
      case 'email':
        $res = User::validatedRequestData($request->action,$request->column,$request->email,Auth::user()->email);
        return response()->json(['res'=>$res]);
        break;
    }
  }

  public function validatedUsername(Request $request)
  {
    if($request->action == 'register'){
      if($request->username == Auth::user()->username){
        $res = User::select('username')->Where('username','=',$request->username)->get();
        return $res->isNotEmpty() ? response()->json(['res'=>true]) : response()->json(['res'=>false]);
      }else{
        $res = User::select('username')->Where('username','=',$request->username)->get();
        return $res->isEmpty() ? response()->json(['res'=>true]) : response()->json(['res'=>false]);
      }
    }    
  }

}
