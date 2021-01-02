<table border="1px" class="d-block">
  <thead>
    <tr>
      <td colspan="6" style="background-color:#d8e4bc;height:30px;"></td>
    </tr>
    <tr>
      <td colspan="6" style="text-align: center;color:#000055;font-size:10pt;background-color:#d8e4bc;">Creada el  7 de Febrero del 2001, mediante Registro Oficial # 261</td>
    </tr>
    <tr>
      <td colspan="6" style="text-align: center;color:#000055;font-size:10pt;font-family:'algerian';background-color:#d8e4bc;">VICERRECTORADO ACADÉMICO</td>
    </tr>
    <tr>
      <td colspan="6" style="text-align: center;color:#000055;font-size:10pt;background-color:#d8e4bc;">EMPRENDIMIENTO E INNOVACION TECNOLOGICA</td>
    </tr>
    <tr>
      <td colspan="6" style="text-align: center;color:#000055;font-size:12pt; font-weight:bold;background-color:#d8e4bc;height:20px">PLAN DE TRABAJO DE  UNESUM - {{$monthYear}}</td>
    </tr>
    <tr>
      <th style="text-align: center;color:#000055;background-color:#b8cce4;">N°</th>
      <th style="text-align: center;color:#000055;background-color:#b8cce4;">FECHA</th>
      <th style="text-align: center;color:#000055;background-color:#b8cce4;">EVENTO</th>
      <th style="text-align: center;color:#000055;background-color:#b8cce4;">RESPONSABLES</th>
      <th style="text-align: center;color:#000055;background-color:#b8cce4;">HORA</th>
      <th style="text-align: center;color:#000055;background-color:#b8cce4;">LUGAR</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($planTrabajos as $key => $pt)
    <tr>
      <td style="text-align: center;">{{$key + 1}}</td>
      <td style="text-align: center;">{{\App\Models\helpers\ConvertToDate::transformDateGetDayAndNewDate($pt->fecha)}}</td>
      <td style="text-align: left;">{{$pt->evento}}</td>
      <td style="text-align: center;">{{$pt->responsables}}</td>
      <td style="text-align: center;">{{$pt->hora}}</td>
      <td style="text-align: center;">{{$pt->lugar}}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="6" style="text-align: center;height:50px;"><div>Ing. Víctor Guaranda Sornoza, Mg. T.I.</div><p>COORDINADOR AREA DE EMPRENDIMIENTO E INNOVACIÓN</p></td>
    </tr>
    <tr >
      <td colspan="6" style="text-align: left;">Elaborado por:</td>
    </tr>
  </tbody>
</table>