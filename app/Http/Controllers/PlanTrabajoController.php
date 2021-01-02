<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanTrabajo;
use Illuminate\Support\Facades\Auth;
use App\Exports\PlanMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\helpers\ConvertToDate;
use Carbon\Carbon;
class PlanTrabajoController extends Controller
{
    public function index()
    {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.planes.index');
    }

    public function create()
    {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.planes.create');
    }

    public function store(Request $request,PlanTrabajo $plane){
      $request->validate([
        'evento'=>'max:255',
        'responsables'=>'max:200',
        'lugar'=>'max:100',
        'hora'=>'max:50',
      ]);

      $plane->evento = $request->evento;
      $plane->lugar = $request->lugar;
      $plane->responsables = $request->responsables;
      $plane->fecha = new Carbon($request->fecha);
      $plane->hora = $request->hora;
      $plane->user_id = Auth::user()->id;

      $plane->save();

      return back()->with("status_success","Nuevo trabajo registrado");
    }

    public function edit(PlanTrabajo $plane)
    {
      return $this->checkStatusUser() ? redirect()->route('login')->with('status',$this->msg) : view('works.planes.edit',compact('plane'));
    }

    public function update(Request $request,PlanTrabajo $plane){
      $request->validate([
        'evento'=>'max:255',
        'responsables'=>'max:200',
        'lugar'=>'max:100',
        'hora'=>'max:50',
      ]);

      $plane->evento = $request->evento;
      $plane->lugar = $request->lugar;
      $plane->responsables = $request->responsables;
      $plane->fecha = new Carbon($request->fecha);
      $plane->hora = $request->hora;
      $plane->user_id = Auth::user()->id;

      $plane->save();

      return back()->with("status_success","Trabajo actualizado");
    }

    public function destroy(PlanTrabajo $plane){
      $dia=ConvertToDate::transformDateGetTranslateDay($plane->fecha);
      $f=ConvertToDate::transformDateGetNewDate($plane->fecha);
      
      $plane->delete();
      
      return back()->with("status_success_delete", "El trabajo del dia ({$dia}) con fecha ({$f}) ha sido eliminado");
    }

    public function exportWorksForYear(PlanMultipleSheets $export, Request $request){
      //Si existen registro del año
      return PlanTrabajo::whereYear('fecha',$request->year)->get()->isEmpty() ? back()->with("status_success_info","No existen registros del año ({$request->year}), del cual esta solicitando.") : $export->forYear($request->year,$request->month_ini,$request->month_end)->download("planTrabajo{$request->year}.xlsx");
    }

    public function listPlanes(){
      $planes = PlanTrabajo::all();

      return datatables()
      ->of($planes)
      ->addColumn('fecha', function(PlanTrabajo $planes){
        return ConvertToDate::transformDateGetDayAndNewDate($planes->fecha);
      })
      ->addColumn('created_at', function(PlanTrabajo $planes){
        return ConvertToDate::transformDateGetNewDate($planes->created_at);
      })
      ->addColumn('updated_at', function(PlanTrabajo $planes){
        return $planes->updated_at->diffForHumans();
      })
      ->addColumn('btn', 'components.table.actionPlanes')
      ->rawColumns(['btn'])
      ->toJson();
    }

}
