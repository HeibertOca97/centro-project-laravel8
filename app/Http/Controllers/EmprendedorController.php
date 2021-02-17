<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmprendedorRequest;
use App\Models\Emprendedor;
use App\Models\NivelEducativo;
use Illuminate\Http\Request;
use App\Models\helpers\ConvertToDate;
use App\Models\helpers\OptionsQuestions;
use App\Models\IdeaNegocio;
use App\Models\InscripcionNuevoEmprendedor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmprendedorController extends Controller
{
    public function __construct()
    {
      
    }

    public function index(){
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.index');
    }

    public function create(){
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.createRegister');
    }

    public function store(){}

    public function edit(){}

    public function update(){}

    public function createNew(Emprendedor $emp){
      $opt1 = $emp->options;
      $opt2 = $emp->option_pn;
      $ne = NivelEducativo::select('id','nivel_edu')->get();
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.createNew',compact('opt1','opt2','ne'));
    }
    
    public function storeNew(EmprendedorRequest $request, Emprendedor $emp, InscripcionNuevoEmprendedor $ins,IdeaNegocio $idea)
    {
      $id = $emp->createStore($request,Auth::user()->id);
      $ins->createStore($request,$id);
      $idea->createStore($request,$id);
      return back()->with("status_success","Nuevo emprendedor registrado");
    }


    public function editNew(Emprendedor $emp){
      $p = $emp->ProfileEnterprisingNewData;
      $in = $emp->IdeaNegocioData;
      $opt1 = $emp->options;
      $opt2 = $emp->option_pn;
      $ne = NivelEducativo::select('id','nivel_edu')->get();

      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.editNew',compact('opt1','opt2','ne','p','in','emp'));
    }
    
    public function updateNew(Emprendedor $emp){
      return $emp;
    }
    
    public function destroy(Emprendedor $emp){
      $emp->delete();
      return back()->with("status_success_delete","(Todo los datos de {$emp->nombres} {$emp->apellidos}) han sido eliminados");
    }
    
    public function listEnterprising(){
      $emp = Emprendedor::all();

      return datatables()
      ->of($emp)
      ->addColumn('nombres', function(Emprendedor $emp){
        return "{$emp->nombres} {$emp->apellidos}";
      })
      ->addColumn('telefonos', function(Emprendedor $emp){
        if($emp->celular){
          $el = "<p><b>Celular: </b>{$emp->celular}</p>";
        }
        if($emp->telefono){
          $el +="<p><b>Telefono: </b>{$emp->telefono}</p>";
        }
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
        $user = $emp->user;
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
