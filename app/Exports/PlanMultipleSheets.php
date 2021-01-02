<?php

namespace App\Exports;

use App\Exports\PlanTrabajoExport;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PlanMultipleSheets implements WithMultipleSheets
{
  use Exportable;

  private $year;
  private $month_initial;
  private $month_end;
  
  public function forYear(int $year,int $ini,int $end)
  {
      $this->year = $year;
      $this->month_initial = $ini;
      $this->month_end = $end;

      return $this;
  }
    
  public function sheets(): array
  {
    return collect(range($this->month_initial, $this->month_end))->map(function($month){
      return new PlanTrabajoExport($this->year, $month);
    })->toArray();
  }
}
