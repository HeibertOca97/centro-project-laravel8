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

\Illuminate\Support\Facades\Auth::routes(['register'=>false]);

Route::get('/', function () {
  // return view('auth.login');
  return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard'); 

  //MODULO PROFILE USER LOGOUT
  Route::get('users/profiles/upload', [App\Http\Controllers\ProfileUserController::class,'index'])->name('user.profiles.index');

  Route::get('users/profiles/upload/password', [App\Http\Controllers\ProfileUserController::class,'editPassword'])->name('user.profiles.password');

  Route::put('users/profiles/{user}',[App\Http\Controllers\ProfileUserController::class,'update'])->name('user.profiles.update');

  Route::put('users/profiles/{user}/password',[App\Http\Controllers\ProfileUserController::class,'updatePassword'])->name('user.profiles.update.password');

  Route::post('users/profiles/image/upload',[App\Http\Controllers\ProfileUserController::class,'updateImage'])->name('user.profiles.updateImage');

  Route::post('users/profiles/image/remove',[App\Http\Controllers\ProfileUserController::class,'removeImage'])->name('user.profiles.removeImage');

  Route::post('users/profiles/validated-data-user-authentique',[App\Http\Controllers\ProfileUserController::class,'validatedUserDataUnique'])->name('user.profiles.validated');

  //MODULO USER
  Route::resource('users', App\Http\Controllers\UserController::class);
  
  Route::get('users/all/list', [App\Http\Controllers\UserController::class,'listAllUsers'])->name('users.listAll');
  
  Route::get('users/all/except', [App\Http\Controllers\UserController::class, 'listAllUsersExceptToAdmin'])->name('users.listAllExceptToAdmin');
  
  Route::put('users/all/profile/{user}', [App\Http\Controllers\UserController::class,'updateInfo'])->name('users.updateInfo');

  //MODULO PERMISOS
  Route::resource('permissions', App\Http\Controllers\PermissionController::class)->except('show');
  
  Route::get('permissions/all/list', [App\Http\Controllers\PermissionController::class,'listPermissions'])->name('permissions.listAll');
  
  //MODULO ROLES
  Route::resource('roles', App\Http\Controllers\RolesController::class)->except('show');

  Route::get('roles/all/list', [App\Http\Controllers\RolesController::class,'listRoles'])->name('roles.listAll');

  //MODULO PLAN TRABAJO
  Route::resource('works/planes', App\Http\Controllers\PlanTrabajoController::class)->except('show');

  Route::get('works/planes/all/list', [App\Http\Controllers\PlanTrabajoController::class,'listPlanes'])->name('planes.listAll');

  Route::post('works/planes/export/foryear', [App\Http\Controllers\PlanTrabajoController::class,'exportWorksForYear'])->name('planes.export.foryear');

  //MODULO MATRIZ ACTIVIDADES
  //Actividades administrables
  Route::resource('works/actividades', App\Http\Controllers\ActivitiesController::class)->except('show');

  Route::get('works/actividades/all/list', [App\Http\Controllers\ActivitiesController::class,'listActivities'])->name('actividades.listAll');

  Route::post('works/actividades/fecha-existente', [App\Http\Controllers\ActivitiesController::class,'validatedExistingDate'])->name('actividades.existingDate');

  Route::post('works/actividades/export/formonth', [App\Http\Controllers\ActivitiesController::class,'exportWorksForMonth'])->name('actividades.export.formonth');
  //Actividades personales
  Route::resource('works/mis-actividades', App\Http\Controllers\MyActivitieController::class)->except('show');

  Route::get('works/mis-actividades/list', [App\Http\Controllers\MyActivitieController::class,'listActivities'])->name('mis-actividades.listAll');

  Route::post('works/mis-actividades/fecha-existente', [App\Http\Controllers\MyActivitieController::class,'validatedExistingDate'])->name('mis-actividades.existingDate');

  //MODULO EMPRENDEDORES  
  Route::resource('emprendedores', App\Http\Controllers\EmprendedorController::class)->except(['show','create','store','edit','destroy']);

  Route::get('emprendedores/formulario-inscripcion-para-emprendedores/create',[ App\Http\Controllers\EmprendedorController::class,'create'])->name('emprendedores.create');

  Route::post('emprendedores/formulario-inscripcion-para-emprendedores',[ App\Http\Controllers\EmprendedorController::class,'store'])->name('emprendedores.store');
  
  Route::get('emprendedores/formulario-inscripcion-para-nuevos-emprendedores/create',[ App\Http\Controllers\EmprendedorController::class,'createNew'])->name('emprendedores.createnew');

  Route::post('emprendedores/formulario-inscripcion-para-nuevos-emprendedores',[ App\Http\Controllers\EmprendedorController::class,'storeNew'])->name('emprendedores.storeNew');

  Route::get('emprendedores/formulario-inscripcion-para-emprendedores/emprendedor={emp}/edit',[ App\Http\Controllers\EmprendedorController::class,'edit'])->name('emprendedores.edit');

  Route::put('emprendedores/formulario-inscripcion-para-emprendedores/{emp}',[ App\Http\Controllers\EmprendedorController::class,'update'])->name('emprendedores.update');
  
  Route::get('emprendedores/formulario-inscripcion-para-nuevos-emprendedores/emprendedor={emp}/edit',[ App\Http\Controllers\EmprendedorController::class,'editNew'])->name('emprendedores.editnew');
  
  Route::put('emprendedores/formulario-inscripcion-para-nuevos-emprendedores/{emp}',[ App\Http\Controllers\EmprendedorController::class,'updateNew'])->name('emprendedores.updatenew');

  Route::delete('emprendedores/{emp}',[ App\Http\Controllers\EmprendedorController::class,'destroy'])->name('emprendedores.destroy');

  Route::get('emprendedores/all/list', [App\Http\Controllers\EmprendedorController::class,'listEnterprising'])->name('emprendedores.listAll');

});//GRUPO DE RUTAS AUTENTICADAS