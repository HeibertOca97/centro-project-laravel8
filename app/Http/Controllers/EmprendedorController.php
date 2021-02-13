<?php

namespace App\Http\Controllers;

use App\Models\Emprendedor;
use App\Models\NivelEducativo;
use Illuminate\Http\Request;
use App\Models\helpers\ConvertToDate;
use App\Models\helpers\OptionsQuestions;
use App\Models\User;
use Illuminate\Support\Str;

class EmprendedorController extends Controller
{
    public function __construct()
    {
      
    }

    public function index(){
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.index');
    }

    public function createRegister(){
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.createRegister');
    }

    public function createNew(Emprendedor $opt){
      $opt = $opt->options;
      $ne = NivelEducativo::select('id','nivel_edu')->get();
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.createNew',compact('opt','ne'));
    }
    
    public function store(){}
    
    public function edit(){}
    
    public function update(){}
    
    public function destroy(){}
    
    public function listEnterprising(){
      $emp = Emprendedor::all();

      return datatables()
      ->of($emp)
      ->addColumn('nombres', function(Emprendedor $emp){
        return "{$emp->nombres} {$emp->apellidos}";
      })
      ->addColumn('telefonos', function(Emprendedor $emp){
        $el = "<p><b>Celular: </b>{$emp->celular}</p><p><b>Telefono: </b>{$emp->telefono}</p>";
        return $el;
      })
      ->addColumn('red_wa', function(Emprendedor $emp){
        $res = OptionsQuestions::TieneWhatsapp($emp->options, $emp->red_wa);
        switch ($emp->red_wa) {
          case 1: return "<p class='d-inline p-2 bg-success text-white'>{$res}</p>";break;
          default: return "<p class='d-inline p-2 bg-danger text-white'>{$res}</p>";break;
        }
      })
      ->addColumn('creador', function(Emprendedor $emp){
        $user = User::findOrFail($emp->user_id);
        return "{$user->nombres} {$user->apellidos}";
      })
      ->addColumn('created_at', function(Emprendedor $emp){
        return ConvertToDate::transformDateGetNewDate($emp->created_at);
      })
      ->addColumn('updated_at', function(Emprendedor $emp){
        return ConvertToDate::transformDateGetNewDate($emp->created_at);
      })
      ->addColumn('btn', 'components.table.actionEnterprising')
      ->rawColumns(['btn','telefonos','red_wa'])
      ->toJson();
    }

}
