<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpCreateRequest;
use App\Http\Requests\EmpNewCreateRequest;
use App\Http\Requests\EmpUpdateRequest;
use App\Models\Emprendedor;
use App\Models\EstadoEducativo;
use App\Models\NivelEducativo;
use Illuminate\Http\Request;
use App\Models\helpers\ConvertToDate;
use App\Models\helpers\OptionsQuestions;
use App\Models\IdeaNegocio;
use App\Models\InscripcionEmprendedor;
use App\Models\InscripcionNuevoEmprendedor;
use App\Models\RazonEmprender;
use App\Models\SectorTrabajo;
use App\Models\TiempoEmprendimento;
use App\Models\TipoDocumentacion;
use App\Models\TipoEmprendimiento;
use App\Models\TipoTrabajo;
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

    public function create(Emprendedor $emp,NivelEducativo $ne, EstadoEducativo $states,TipoTrabajo $t_tbs,TipoDocumentacion $t_docs, SectorTrabajo $sect_tbs,TiempoEmprendimento $time_emps, RazonEmprender $razon_emps,TipoEmprendimiento $type_emps){
      $sexos = $emp->sexo;
      $opts = $emp->options;
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.createRegister',compact('opts','sexos','ne','states','t_docs','t_tbs','sect_tbs','time_emps','razon_emps','type_emps'));
    }

    public function store(/*EmpNewCreateRequest*/ Request $request){
      return $request;
    }

    public function edit(){}

    public function update(){}

    public function createNew(Emprendedor $emp,NivelEducativo $ne){
      $opt1 = $emp->options;
      $opt2 = $emp->option_pn;
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.createNew',compact('opt1','opt2','ne'));
    }
    
    public function storeNew(EmpCreateRequest $request, Emprendedor $emp, InscripcionNuevoEmprendedor $ins,IdeaNegocio $idea)
    {
      $id = $emp->createStore($request,Auth::user()->id);
      $ins->createStore($request,$id);
      $idea->createStore($request,$id);
      return back()->with("status_success","Nuevo emprendedor registrado");
    }


    public function editNew(Emprendedor $emp, NivelEducativo $ne){
      $p = $emp->ProfileEnterprisingNewData;
      $in = $emp->IdeaNegocioData;
      $opt1 = $emp->options;
      $opt2 = $emp->option_pn;

      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.enterprising.editNew',compact('opt1','opt2','ne','p','in','emp'));
    }
    
    public function updateNew(EmpUpdateRequest $request, Emprendedor $emp, InscripcionNuevoEmprendedor $ins,IdeaNegocio $idea){
      $emp->editUpdate($request);
      $ins->editUpdate($emp->ProfileEnterprisingNewData,$request);
      $idea->editUpdate($emp->IdeaNegocioData,$request);
      return back()->with("status_success","Actualizacion existosa");
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
        if($emp->celular || $emp->telefono){
          $el = "<p><b>Celular: </b>{$emp->celular}</p>";
          $el .="<p><b>Telefono: </b>{$emp->telefono}</p>";
          return $el;
        }
      })
      ->addColumn('red_wa', function(Emprendedor $emp){
        $res = OptionsQuestions::TieneWhatsapp($emp->options, $emp->red_wa);
        switch ($emp->red_wa) {
          case 1: return "<p class='d-inline p-2 bg-success text-white'>{$res}</p>";break;
          default: return "<p class='d-inline p-2 bg-danger text-white'>{$res}</p>";break;
        }
      })
      ->addColumn('tipo', function(Emprendedor $emp){
        $con1 = InscripcionNuevoEmprendedor::where('emprendedor_id','=',$emp->id)->get();
        $con2 = InscripcionEmprendedor::where('emprendedor_id','=',$emp->id)->get();
        if($con1->isNotEmpty()){
          return '<p><b>Ficha de inscripcion:</b> Datos del emprendedor y su <b>idea de negocio</b>.</p>';
        }
        if($con2->isNotEmpty()){
          return '<p><b>Ficha de inscripcion:</b> Datos del emprendedor y su <b>emprendimiento</b>.</p>';
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
      ->rawColumns(['btn','telefonos','red_wa','tipo'])
      ->toJson();
    }

}
