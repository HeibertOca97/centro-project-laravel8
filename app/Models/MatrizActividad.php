<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrizActividad extends Model
{
    use HasFactory;

    protected $fillable = [
      'fecha',
      'horario',
      'modalidad',
      'actividades',
      'observaciones',
      'user_id',
    ];

}
