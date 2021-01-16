<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PlanTrabajo;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithTitle;

class PlanTrabajoExport implements 
FromView,
WithColumnWidths,
WithStyles, 
WithDrawings,
ShouldAutoSize,
WithTitle
{

  private $month;
  private $year;

  public function __construct(int $year, int $month)
  {
      $this->month = $month;
      $this->year  = $year;
  }

  public function view(): View
  {
    $monthYear = Str::upper(Carbon::parse("{$this->year}-{$this->month}-01")->translatedFormat('F Y'));

    $planTrabajos = PlanTrabajo::whereYear('fecha',$this->year)->whereMonth('fecha', $this->month)->orderBy('fecha','asc')->get();

    return view('exports.tbPlanTrabajo',compact('planTrabajos','monthYear'));
  }

  public function title(): string
  {
      return Str::upper(Carbon::parse("{$this->year}-{$this->month}-01")->translatedFormat('F Y'));
  }

  public function columnWidths(): array
  {
      return [
          'A' => 5.15,
          'B' => 12.30,            
          'C' => 73.30,            
          'D' => 35.90,            
          'E' => 15,            
          'F' => 16.50,            
      ];
  }

  public function styles(Worksheet $sheet)
  {
      return [
           3=> ['font' => ['italic' => true]],
      ];
  }

  public function drawings()
  {
      $drawing = new Drawing();
      $drawing->setName('unesum');
      $drawing->setDescription('CELID');
      $drawing->setPath(public_path('image/logo/unesum.png'));
      $drawing->setHeight(90);
      $drawing->setOffsetY(20);
      $drawing->setCoordinates('B1');

      $drawing2 = new Drawing();
      $drawing2->setName('emprende_unesum');
      $drawing2->setDescription('CELID');
      $drawing2->setPath(public_path('image/logo/emprende_unesum.png'));
      $drawing2->setHeight(90);
      $drawing2->setOffsetY(20);
      $drawing2->setCoordinates('E1');

      return [$drawing,$drawing2];
  }

}
