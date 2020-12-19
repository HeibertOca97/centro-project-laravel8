<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  // return view('auth.login');
  return redirect()->route('login');
});

// Auth::routes();
Auth::routes(['register'=>false]);

Route::get('/informacion-confidencial', function () {
  dd(session('auth'));
    return "informacion confidencial";
})->middleware('password.confirm');

Route::middleware('auth')->group(function () {
  
  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard'); 

  //MODULO PROFILE USER LOGOUT
  Route::get('users/profiles/upload', [App\Http\Controllers\ProfileUserController::class,'index'])->name('user.profiles.index');

  Route::get('users/profiles/upload/password', [App\Http\Controllers\ProfileUserController::class,'editPassword'])->name('user.profiles.password');

  Route::put('users/profiles/{user}',[App\Http\Controllers\ProfileUserController::class,'update'])->name('user.profiles.update');

  Route::put('users/profiles/{user}/password',[App\Http\Controllers\ProfileUserController::class,'updatePassword'])->name('user.profiles.update.password');

  Route::post('users/profiles/image/upload',[App\Http\Controllers\ProfileUserController::class,'updateImage'])->name('user.profiles.updateImage');

  Route::post('users/profiles/image/remove',[App\Http\Controllers\ProfileUserController::class,'removeImage'])->name('user.profiles.removeImage');

  //MODULO USER
  Route::resource('users', App\Http\Controllers\UserController::class);
  
  Route::get('users/all/list', [App\Http\Controllers\UserController::class,'listUsers'])->name('users.listAll');
  
  Route::get('users/all/profile/{user}/listEdit', [App\Http\Controllers\UserController::class,'editListAll'])->name('users.editAll');
  
  Route::put('users/all/profile/{user}', [App\Http\Controllers\UserController::class,'updateAll'])->name('users.updateAll');

  //MODULO PERMISOS
  Route::resource('permissions', App\Http\Controllers\PermissionController::class)->except('show');
  
  Route::get('permissions/all/list', [App\Http\Controllers\PermissionController::class,'listPermissions'])->name('permissions.listAll');
  
  //MODULO ROLES
  Route::resource('roles', App\Http\Controllers\RolesController::class)->except('show');

  Route::get('roles/all/list', [App\Http\Controllers\RolesController::class,'listRoles'])->name('roles.listAll');

});//GRUPO DE RUTAS AUTENTICADAS