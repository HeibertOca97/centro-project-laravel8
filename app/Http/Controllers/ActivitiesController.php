<?php

namespace App\Http\Controllers;

use App\Models\MatrizActividad;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\ActivitieMultipleSheets;
use App\Models\helpers\ConvertToDate;
use Carbon\Carbon;

class ActivitiesController extends Controller
{
   public function __construct()
  {
    $this->middleware(['permission:Activities.index'],['only'=>['index','listActivities']]);
    $this->middleware(['permission:Activities.create'],['only'=>['create','store']]);
    $this->middleware(['permission:Activities.edit'],['only'=>['edit','update']]);
    $this->middleware(['permission:Activities.destroy'],['only'=>'destroy']);
    $this->middleware(['permission:Activities.download'],['only'=>'exportWorksForMonth']);
  }

  public function index(){
    return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.activities.index');
  }
  
  public function create(User $users){
    $users = $users->orderBy('nombres','asc')->select('id','nombres','apellidos')->get();
  
    return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.activities.create',compact('users'));
  }
  
  public function store(Request $request, MatrizActividad $actividade){
    $request->validate([
      'miembro'=>'required',
      'horario'=>'max:100',
      'modalidad'=>'max:150',
      'observacion'=>'max:255',
      'fecha'=>'required'
    ]);      
    $actividade->fecha = $request->fecha;
    $actividade->horario = $request->horario;
    $actividade->modalidad = $request->modalidad;
    $actividade->actividades = json_encode($request->actividades);
    $actividade->observaciones = $request->observacion;
    $actividade->user_id = $request->miembro;
    
    $actividade->save();
  
    return back()->with("status_success","Nueva actividad registrada");
  }
  
  public function edit(MatrizActividad $actividade, User $users){
    $act = $actividade;
    
    $miembro = $users->select('id','nombres','apellidos')->findOrFail($actividade->user_id);
    
    $users = $users->orderBy('nombres','asc')->select('id','nombres','apellidos')->where('id','!=',$actividade->user_id)->get();
  
    return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.activities.edit',compact('users','miembro','act'));
  }
  
  public function update(Request $request, MatrizActividad $actividade){
    $request->validate([
      'miembro'=>'required',
      'horario'=>'max:100',
      'modalidad'=>'max:150',
      'observacion'=>'max:255',
      'fecha'=>'required'
    ]);  
    $actividade->fecha = $request->fecha;
    $actividade->horario = $request->horario;
    $actividade->modalidad = $request->modalidad;
    $actividade->actividades = json_encode($request->actividades);
    $actividade->observaciones = $request->observacion;
    $actividade->user_id = $request->miembro;
    
    $actividade->save();
    return back()->with("status_success","Actividad actualizada");
  }
  
  
  public function destroy(MatrizActividad $actividade){
    $actividade->delete();
    return back()->with("status_success_delete", "La actividad con fecha ({$actividade->fecha}) ha sido eliminada");
  }
  
  public function listActivities(){
    $activitie = MatrizActividad::orderBy('fecha','desc')->get();
    
    return datatables()
    ->of($activitie)
    ->addColumn('miembro', function($activitie){
      $user = $activitie->user_id ? User::findOrFail($activitie->user_id) : '';
      return $activitie->user_id ? "{$user->nombres} {$user->apellidos}" : "";
    })
    ->addColumn('puesto', function($activitie){
      $user = $activitie->user_id ? User::findOrFail($activitie->user_id) : '';
      return $activitie->user_id ? "{$user->cargo}" : "";
    })
    ->addColumn('fecha', function($activitie){
      return ConvertToDate::transformDate($activitie->fecha);
    })
    ->addColumn('actividades', function($activitie){
      return json_decode($activitie->actividades);
    })
    ->addColumn('created_at', function($activitie){
      return ConvertToDate::transformDateGetNewDate($activitie->created_at);
    })
    ->addColumn('updated_at', function($activitie){
      return ConvertToDate::transformDateGetNewDate($activitie->updated_at);
    })
    ->addColumn('btn', 'components.table.actionActivities')
    ->rawColumns(['btn'])
    ->toJson();
  }
  
  public function exportWorksForMonth(Request $request, ActivitieMultipleSheets $act){
    $f_ini_year = ConvertToDate::extractYear($request->f_inicio);
    $f_ini = ConvertToDate::transformDateGetNewDate($request->f_inicio);
    $f_last = ConvertToDate::transformDateGetNewDate($request->f_fin);
  
    return MatrizActividad::whereYear('fecha',$f_ini_year)->get()->isEmpty() ? back()->with("status_success_info","No existen registros del año ({$f_ini_year}), del cual esta solicitando.") : $act->forDate($f_ini,$f_last)->download("Matriz_Actividades AREA DE EMPRENDIMIENTO E INNOVACIÓN UNESUM {$f_ini_year}.xlsx");
  }

  public function validatedExistingDate(Request $request)
  {
    if($request->miembro != null || $request->miembro == ''){
      if($request->action=='created'){
        $fecha = MatrizActividad::whereDate('fecha',"{$request->fecha}")->where('user_id','=',$request->miembro)->select('user_id','fecha')->get();
        
        return $fecha->isNotEmpty() ? response()->json(['res'=>true]) : response()->json(['res'=>false]);
      }else{
        $fecha = MatrizActividad::whereDate('fecha',"{$request->fecha}")
        ->where('fecha','!=',"{$request->fechaActual}")
        ->where('user_id','=',$request->miembro)
        ->select('user_id','fecha')->get();
        
        return $fecha->isNotEmpty() ? response()->json(['res'=>true]) : response()->json(['res'=>false]);
      }
    }
  }

}
