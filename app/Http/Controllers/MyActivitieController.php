<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\helpers\ConvertToDate;
use App\Models\MatrizActividad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyActivitieController extends Controller
{
  public function __construct()
  {
    $this->middleware(['permission:MyActivitie.index'],['only'=>['index','listActivities']]);
    $this->middleware(['permission:MyActivitie.create'],['only'=>['create','store']]);
    $this->middleware(['permission:MyActivitie.edit'],['only'=>['edit','update']]);
    $this->middleware(['permission:MyActivitie.destroy'],['only'=>'destroy']);
  }

  public function index()
  {
    return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.myactivities.index');
  }

  public function create()
  {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.myactivities.create');
  }

  public function store(Request $request,MatrizActividad $mis_actividade)
  {
    $request->validate([
    'fecha'=>'required',
    'horario'=>'max:100',
    'modalidad'=>'max:150',
    'observacion'=>'max:255'
    ]);
    $mis_actividade->fecha = $request->fecha;
    $mis_actividade->horario = $request->horario;
    $mis_actividade->modalidad = $request->modalidad;
    $mis_actividade->actividades = json_encode($request->actividades);
    $mis_actividade->observaciones = $request->observacion;
    $mis_actividade->user_id = Auth::user()->id;

    $mis_actividade->save();

    return back()->with("status_success","Nueva actividad registrada");
  }

  public function edit(MatrizActividad $mis_actividade)
  {
    $act = $mis_actividade;
    return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.myactivities.edit',compact('act'));
  }

  public function update(Request $request, MatrizActividad $mis_actividade)
  {
    $request->validate([
      'fecha'=>'required',
      'horario'=>'max:100',
      'modalidad'=>'max:150',
      'observacion'=>'max:255'
    ]);
    $mis_actividade->fecha = $request->fecha;
    $mis_actividade->horario = $request->horario;
    $mis_actividade->modalidad = $request->modalidad;
    $mis_actividade->actividades = json_encode($request->actividades);
    $mis_actividade->observaciones = $request->observacion;

    $mis_actividade->save();

    return back()->with("status_success","Actividad actualizada");
  }

  public function destroy(MatrizActividad $mis_actividade)
  {
    $mis_actividade->delete();
    return back()->with("status_success_delete", "La actividad con fecha ({$mis_actividade->fecha}) ha sido eliminada");
  }

  public function listActivities(){
    $activitie = MatrizActividad::where('user_id','=',Auth::user()->id)->orderBy('fecha','desc')->get();

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
    ->addColumn('btn', 'components.table.actionMyActivities')
    ->rawColumns(['btn'])
    ->toJson();
  }

  public function validatedExistingDate(Request $request)
  {
    if($request->action=='created'){
      $fecha = MatrizActividad::whereDate('fecha',"{$request->fecha}")->where('user_id','=',Auth::user()->id)->select('user_id','fecha')->get();
      
      return $fecha->isNotEmpty() ? response()->json(['res'=>true]) : response()->json(['res'=>false]);
    }else{
      $fecha = MatrizActividad::whereDate('fecha',"{$request->fecha}")
      ->where('fecha','!=',"{$request->fechaActual}")
      ->where('user_id','=',Auth::user()->id)
      ->select('user_id','fecha')->get();
      
      return $fecha->isNotEmpty() ? response()->json(['res'=>true]) : response()->json(['res'=>false]);
    }
  }

}
