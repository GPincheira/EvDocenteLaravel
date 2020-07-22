<div class="row container">
  <div class="row">
    <div>
      <img src="{{ public_path() }}/images/logo.png" height="60px" width="80px;" />
    </div>
  </div>
</div><br><br>

<div>
  <table>
      <thead>
        <tr height="25pt">
          <th colspan="14" style="text-align:center">
            RESUMEN CALIFICACIONES AÑO {{ $año }}
            @if(@Auth::user()->hasRole('SecFacultad'))
              {{ @Auth::user()->secFacultad->facultad->Nombre }}
            @endif
          </th>
        </tr>
      </thead>
  </table>
</div>

<div>
  <table>
      <thead>
        <tr>
          <th rowspan="2">Facultad</th>
          <th rowspan="2">Categoría</th>
          <th rowspan="2">Nombre</th>
          <th colspan="2">Actividades de Docencia</th>
          <th colspan="2">Actividades de Investigación</th>
          <th colspan="2">Extension y Vinculación</th>
          <th colspan="2">Administración Académica</th>
          <th colspan="2">Otras actividades realizadas</th>
          <th rowspan="2">Nota Final</th>
        </tr>
        <tr>
          <th>Tiempo(%)</th>
          <th>Nota</th>
          <th>Tiempo(%)</th>
          <th>Nota</th>
          <th>Tiempo(%)</th>
          <th>Nota</th>
          <th>Tiempo(%)</th>
          <th>Nota</th>
          <th>Tiempo(%)</th>
          <th>Nota</th>
        </tr>
      </thead>
      <tbody>
      @foreach($evs as $ev)
          <tr>
            <td>{{ $ev->Nombre }}</td>
            <td>{{ $ev->Categoria }}</td>
            <td>{{ $ev->Nombres }} {{ $ev->ApellidoPaterno }} {{ $ev->ApellidoMaterno }}</td>
            <td>{{ $ev->p1 }}%</td>
            <td style="text-align:left">{{ $ev->n1 }} </td>
            <td>{{ $ev->p2 }}%</td>
            <td style="text-align:left">{{ $ev->n2 }} </td>
            <td>{{ $ev->p3 }}%</td>
            <td style="text-align:left">{{ $ev->n3 }} </td>
            <td>{{ $ev->p4 }}%</td>
            <td style="text-align:left">{{ $ev->n4 }} </td>
            <td>{{ $ev->p5 }}%</td>
            <td style="text-align:left">{{ $ev->n5 }} </td>
            <td style="text-align:left">{{ $ev->NotaFinal }}</td>
          </tr>
      @endforeach
      </tbody>
  </table>
</div>
