<table border="1px" class="d-block" width="1200px">
  <thead>
    <tr>
      <th style="text-align: center;font-weight:bold;font-size:8pt;">No.</th>
      <th style="text-align: center;font-weight:bold;font-size:8pt;">Apellidos y Nombres</th>
      <th style="text-align: center;font-weight:bold;font-size:8pt;">Demoninación del puesto</th>
      <th style="text-align: center;font-weight:bold;font-size:8pt;">Fecha</th>
      <th style="text-align: center;font-weight:bold;font-size:8pt;">Horario de trabajo</th>
      <th style="text-align: center;font-weight:bold;font-size:8pt;">Modalidad de trabajo: Presencial, Teletrabajo, Ninguno</th>
      <th style="text-align: center;font-weight:bold;font-size:8pt;">Actividades</th>
      <th style="text-align: center;font-weight:bold;font-size:8pt;">Observaciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($activities as $key=>$act)
    <tr>
      <td style="text-transform: uppercase; text-align:center;font-size:8pt;">{{$key + 1}}</td>
      <td style="text-transform: uppercase; text-align:center;font-size:8pt;">{{$act->nombres}} {{$act->apellidos}}</td>
      <td style="text-align:center;font-size:8pt;">{{$act->cargo}}</td>
      <td style="text-align:center;font-size:8pt;">{{\App\Models\helpers\ConvertToDate::transformDate($act->fecha)}}</td>
      <td style="text-align:center;font-size:8pt;">{{$act->horario}}</td>
      <td style="text-align:justify;font-size:8pt;">{{$act->modalidad}}</td>
      <td style="text-align:justify;font-size:8pt;">
        <ol>
          @foreach (json_decode($act->actividades) as $indice => $item)
          <li>{{$indice + 1}}. {{$item}}</li>
          @endforeach
        </ol>
      </td>
      <td style="text-align:justify;font-size:8pt;">{{$act->observaciones}}</td>
    </tr>
    @endforeach
  </tbody>
</table>