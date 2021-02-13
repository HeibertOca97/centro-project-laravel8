<?php
namespace App\Models\helpers;
/**
 * Coleccion de respuesta directas  (Si o no, etc)
 */
use Illuminate\Support\Str;
trait OptionsQuestions
{

  public static function TieneWhatsapp($options,$value){
    $value = intval($value);
    foreach ($options as $opt) {
      if($opt['_id'] == $value){
        return Str::upper($opt['opt']);
      }
    }
  }
}
