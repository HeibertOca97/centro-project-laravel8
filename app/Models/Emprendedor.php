<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Emprendedor extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "emprendedores";

    public $options = [['_id'=>1,'opt'=>'Si'],['_id'=>0,'opt'=>'No']];

    public $optionPN = [['_id'=>1,'opt'=>'Si'],['_id'=>2,'opt'=>'Incompleto'],['_id'=>0,'opt'=>'No']];
    
    public function user(){
      return $this->belongsTo(User::class);
    }
    
}
