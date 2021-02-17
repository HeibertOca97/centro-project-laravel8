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
}
