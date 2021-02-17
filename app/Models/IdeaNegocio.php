<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeaNegocio extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "ideanegocios";

    public function createStore($request, $emp_id){
      $this->nom_idea=$request->nom_idea; 
      $this->t_plan=$request->t_plan; 
      $this->sector_act=$request->sector_act; 
      $this->consumidores=$request->consumidor; 
      $this->competidores=$request->competidor; 
      $this->habilidades=$request->habilidades; 
      $this->debilidades=$request->debilidades; 
      $this->t_apoyo=$request->t_apoyo; 
      $this->emprendedor_id=$emp_id; 
      $this->save();
    }
}
