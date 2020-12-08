<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilPasswordRequest;
use App\Http\Requests\PerfilUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileUserController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      return view('user.profile.index',compact('user'));
    }

    public function editPassword()
    {
      $user = Auth::user();
      return view('user.profile.password',compact('user'));
    }

    public function update(PerfilUpdateRequest $request, User $user)
    {

      $user = $user::findOrFail($user->id);

      $user->cedula = $request->cedula;
      $user->nombres = $request->nombres;
      $user->apellidos = $request->apellidos;
      $user->cargo = $request->cargo;
      $user->username = $request->username;
      $user->email = $request->email;

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

        if($user->save()){
          return redirect()->back();
        }
      }

    }
}
