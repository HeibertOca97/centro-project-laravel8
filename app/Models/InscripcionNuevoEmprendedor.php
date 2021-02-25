<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionNuevoEmprendedor extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $table = "profilenewemprendedors";

    public function createStore($request, $emp_id){
      $this->ciudad=$request->ciudad; 
      $this->direccion=$request->direccion; 
      $this->nom_universidad=$request->estudio; 
      $this->niveleducativo_id=$request->nivel; 
      $this->emprendedor_id=$emp_id;
      $this->save();
    }

    public function editUpdate($column,$request){
      $column->ciudad=$request->ciudad; 
      $column->direccion=$request->direccion; 
      $column->nom_universidad=$request->estudio; 
      $column->niveleducativo_id=$request->nivel; 
      $column->save();
    }
}
