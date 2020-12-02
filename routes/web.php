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

Auth::routes();
// Auth::routes(['register'=>false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/informacion-confidencial', function () {
  dd(session('auth'));
    return "informacion confidencial";
})->middleware('password.confirm');

Route::group(['middleware' => 'role:super admin'], function () {
  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');    
});

Route::resource('users', App\Http\Controllers\UserController::class);