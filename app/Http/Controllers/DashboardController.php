<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {     
      if(Auth::user()->status != 1){
        Auth::logout();
        return redirect()->route('login')->with('status','Su cuenta se encuentra inactiva, para mayor informacion comunicarse con el administrador.');
      }
    
      $users = User::all()->count();
      
      return view('dashboard',compact('users'));
    }
}
