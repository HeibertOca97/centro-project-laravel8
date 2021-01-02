<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $msg = 'Su cuenta de usuario ha sido desactivada, para mayor informacion comunicarse con el administrador.';

    public function checkStatusUser(){
      if(Auth::user()->status != 1){
        Auth::logout();
        return true;
      }
      return false;
    }

}
