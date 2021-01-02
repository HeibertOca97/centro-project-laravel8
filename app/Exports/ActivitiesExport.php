<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\Models\helpers\ConvertToDate;

class ActivitiesExport implements 
FromView,
WithColumnWidths,
WithDrawings,
ShouldAutoSize,
WithTitle
{
  private $year;
  private $month;
  private $day;

  public function __construct(int $year, int $month,int $day)
  {
    $this->year = $year;
    $this->month  = $month;
    $this->day = $day;
  }

  public function view(): View
  {
    $activities = DB::table('matriz_actividads')
      ->join('users','users.id','=','matriz_actividads.user_id')
      ->select('users.nombres','users.apellidos','users.cargo','matriz_actividads.*')
      ->whereDay('fecha',$this->day)
      ->whereMonth('fecha',$this->month)
      ->whereYear('fecha',$this->year)
      ->get();
    return view('exports.tbActivities',compact('activities'));
  }

  public function columnWidths(): array
  {
    return [
        'A' => 4.15,
        'B' => 30,            
        'C' => 20,            
        'D' => 20.30,            
        'E' => 17.30,            
        'F' => 17.60,            
        'G' => 55.30,            
        'H' => 39.15,            
    ];
  }

  public function title(): string
  {
    // return Str::upper(Carbon::parse("{$this->year}-{$this->month}-{$this->day}")->translatedFormat('d-Y F'));
    $date = "{$this->year}-{$this->month}-{$this->day}";
    $dia = ConvertToDate::extractDay($date);
    $mes_es = ConvertToDate::transformDateGetTranslateMonth($date);
    $mes_subt = Str::substr($mes_es,0, 3);
    return "{$dia} {$mes_subt}";
  }

  public function drawings()
  {
    $drawing = new Drawing();
    $drawing->setName('unesum');
    $drawing->setDescription('CELID');
    $drawing->setPath(public_path('image/logo/unesum.png'));
    $drawing->setHeight(90);
    $drawing->setOffsetY(20);
    $drawing->setCoordinates('D1');

    $drawing2 = new Drawing();
    $drawing2->setName('emprende_unesum');
    $drawing2->setDescription('CELID');
    $drawing2->setPath(public_path('image/logo/depart_unesum.png'));
    $drawing2->setHeight(90);
    $drawing2->setOffsetY(20);
    $drawing2->setCoordinates('G1');

    return [$drawing,$drawing2];
  }
    

}
