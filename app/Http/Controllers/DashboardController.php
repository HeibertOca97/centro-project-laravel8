<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
    public function index(User $user)
    {     
      $users = $user->all()->count();
      
      $numPermission = Auth::user()->getRoleNames()->isEmpty() ? '0' : count(Auth::user()->getAllPermissions());
      
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('dashboard',compact('users','numPermission'));
    }
}
