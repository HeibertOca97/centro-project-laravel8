<?php
namespace App\Models\helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;


trait ConvertToDate{

  public static function transformDateGetDayAndNewDate($fecha)
  {
    $dia_ES = Str::upper(self::transformDateGetTranslateDay($fecha));
    $day = self::extractDay($fecha);
    $month = self::extractMonth($fecha);
    $year = self::extractYear($fecha);

    return "{$dia_ES} {$day}/{$month}/{$year}";
  }

  public static function transformDateGetNewHours($fecha)
  {
    $h = new Carbon($fecha);
    return $h->format('H\\Hi');
  }
  
  public static function transformDateGetNewDate($fecha)
  {
    $newDate = new Carbon($fecha);
    return $newDate->format('d-m-Y');
  }

  public static function transformDate($date)
  {
    $diaSemana_es = Str::ucfirst(self::transformDateGetTranslateDay($date)); 
    $mes_es = Str::ucfirst(self::transformDateGetTranslateMonth($date)); 
    $day = self::extractDay($date);
    $year = self::extractYear($date);

    return "{$diaSemana_es} {$day} de {$mes_es} {$year}";
  }

  //transformar a español los dias de la semana y los meses
  public static function transformDateGetTranslateDay($fecha)
  {
    $d = new Carbon($fecha);
    return Carbon::create($d->format('l'))->locale('es_ES')->dayName;
  }

  public static function transformDateGetTranslateMonth($fecha)
  {
    $m = new Carbon($fecha);
    return Carbon::create($m->format('F'))->locale('es_ES')->monthName;
  }

  //extraccion del dia-mes-año
  public static function extractDay($date){
    $day = new Carbon($date);
    return $day->format('d');
  }

  public static function extractMonth($date){
    $newFormat = new Carbon($date);
    return $newFormat->format('m');
  }

  public static function extractYear($date){
    $newFormat = new Carbon($date);
    return $newFormat->format('Y');
  }

}


