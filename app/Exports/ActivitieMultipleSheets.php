<?php

namespace App\Exports;

use App\Exports\ActivitiesExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\helpers\ConvertToDate;

class ActivitieMultipleSheets implements WithMultipleSheets
{
  use Exportable;
  
  private $date_ini;
  private $date_last;
  
  public function forDate(string $ini,string $end)
  {
      $this->date_ini = $ini;
      $this->date_last = $end;

      return $this;
  }  

  public function sheets(): array
  {
    $sheets = [];
    foreach (range(ConvertToDate::extractMonth($this->date_ini), ConvertToDate::extractMonth($this->date_last)) as $month) {
      foreach (range(ConvertToDate::extractDay($this->date_ini), ConvertToDate::extractDay($this->date_last)) as $day) {
        $sheets[] = new ActivitiesExport(ConvertToDate::extractYear($this->date_last), $month,$day);
      }
    }
    return $sheets;
  }

}
