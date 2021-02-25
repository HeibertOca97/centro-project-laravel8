<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Emprendedor extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "emprendedores";

    public $sexo = [['_id'=>1,'opt'=>'Masculino'],['_id'=>2,'opt'=>'Femenino']];

    public $options = [['_id'=>1,'opt'=>'Si'],['_id'=>0,'opt'=>'No']];

    public $option_pn = [['_id'=>1,'opt'=>'Si'],['_id'=>2,'opt'=>'Incompleto'],['_id'=>0,'opt'=>'No']];

    public function getRouteKeyName()
    {
      return "slug";
    }

    public function createStore($request, $user_id){
      $this->cedula=$request->cedula;
      $this->nombres=$request->nombres;
      $this->apellidos=$request->apellidos;
      $this->email=$request->email;
      $this->fec_nac=$request->fec_nac;
      $this->celular=$request->celular;
      $this->telefono=$request->telefono;
      $this->red_wa=$request->red_wa;
      $this->user_id=$user_id;
      $this->slug = Str::slug("{$request->nombres} {$request->apellidos}");
      $this->save();
      return $this->id;
    }

    public function editUpdate($request){
      $this->cedula=$request->cedula;
      $this->nombres=$request->nombres;
      $this->apellidos=$request->apellidos;
      $this->email=$request->email;
      $this->fec_nac=$request->fec_nac;
      $this->celular=$request->celular;
      $this->telefono=$request->telefono;
      $this->red_wa=$request->red_wa;
      $this->slug = Str::slug("{$request->nombres} {$request->apellidos}");
      $this->save();
    }

    //RELACIONES
    //Usuario creador de la ficha
    public function user(){
      return $this->belongsTo(User::class);
    }

    //Datos del formulario del emprendedor con idea de negocio
    public function ProfileEnterprisingNewData(){
      return $this->hasOne(InscripcionNuevoEmprendedor::class);
    }
    
    public function IdeaNegocioData(){
      return $this->hasOne(IdeaNegocio::class);
    }
    
    //Datos del formulario del emprendedor con emprendimiento
    public function ProfileEnterprisingData(){
      return $this->hasOne(InscripcionNuevoEmprendedor::class);
    }

    public function EmprendimientoData(){
      return $this->hasOne(Emprendimiento::class);
    }


    
}
