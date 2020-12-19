<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescriptionPermisions extends Model
{
    use HasFactory;

    protected $fillable = [
      'descripcion',
      'permission_id'
    ];

    public function permiso(){
      return \Spatie\Permission\Models\Permission::where('id','=',$this->permission_id)->get();
      // return $this->belongsTo('Spatie\Permission\Models\Permission');
    }
}
