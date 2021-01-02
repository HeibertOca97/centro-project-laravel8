<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTrabajo extends Model
{
    use HasFactory;

    protected $fillable = ['evento','lugar','responsables','fecha','hora','user_id'];
  
}
