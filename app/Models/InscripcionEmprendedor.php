<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionEmprendedor extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "profileregisteremprendedors";
    
    // protected $fillable = [
    //   'edad',
    //   'sexo',
    //   'tipodoc_id',
    //   'nivel1_id',
    //   'nivel2_id',
    //   'nivel3_id',
    //   'nivel4_id',
    //   'fec_titulacion',
    //   'trabajoActual',
    //   'tipotrabajo_id',
    //   'ingreso_princ',
    //   'ingreso_emp',
    //   'sectortrabajo_id',
    //   'sector_tb',
    //   'emprendedore_id',
    // ];

}
