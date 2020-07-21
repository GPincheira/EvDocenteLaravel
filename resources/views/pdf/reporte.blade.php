@extends('pdf.layout')

@section('content')
<div>

  <div class="row container">
  	<div class="row">
  		<div class="col-md-4">
  			<img src="http://www.portalalumnos.ucm.cl/v2/assets/img/logo-ucm.jpg" class="logo" width="160" height="56"/>
  		</div>
  	</div>
  </div>

<div class="row container">
  <div class="col-lg-12 margin-tb content">
    <h3>RESUMEN CALIFICACIONES AÑO {{ $año }}</h3>
    @if(@Auth::user()->hasRole('SecFacultad'))
    <h3>{{ @Auth::user()->secFacultad->facultad->Nombre }}</h3>
    @endif
  </div>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table style="width:100%">
				<tbody>
          <tr style="background-color:rgba(200,200,200)">
						<th rowspan="2" width="18%">Facultad</th>
						<th rowspan="2" width="10%">Categoría</th>
            <th rowspan="2" width="18%">Nombre</th>
            <th colspan="2" width="9%">Actividades de Docencia</th>
            <th colspan="2" width="9%">Actividades de Investigación</th>
            <th colspan="2" width="9%">Extension y Vinculación</th>
            <th colspan="2" width="9%">Administración Académica</th>
            <th colspan="2" width="9%">Otras actividades realizadas</th>
            <th rowspan="2" width="9%">Nota Final</th>
					</tr>
          <tr style="background-color:rgba(200,200,200)">
  					<th width="4%">Tiempo</th>
            <th width="5%">Nota</th>
            <th width="4%">Tiempo</th>
            <th width="5%">Nota</th>
            <th width="4%">Tiempo</th>
            <th width="5%">Nota</th>
            <th width="4%">Tiempo</th>
            <th width="5%">Nota</th>
            <th width="4%">Tiempo</th>
            <th width="5%">Nota</th>
  			  </tr>
          @foreach ($evs as $ev)
            <tr>
              <td>{{ $ev->Nombre }}</td>
              <td>{{ $ev->Categoria }}</td>
              <td>{{ $ev->Nombres }} {{ $ev->ApellidoPaterno }} {{ $ev->ApellidoMaterno }}</td>
              <td>{{ $ev->p1 }}%</td>
              <td>{{ $ev->n1 }}</td>
              <td>{{ $ev->p2 }}%</td>
              <td>{{ $ev->n2 }}</td>
              <td>{{ $ev->p3 }}%</td>
              <td>{{ $ev->n3 }}</td>
              <td>{{ $ev->p4 }}%</td>
              <td>{{ $ev->n4 }}</td>
              <td>{{ $ev->p5 }}%</td>
              <td>{{ $ev->n5 }}</td>
              <td>{{ $ev->NotaFinal }}</td>
            </tr>
          @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>

@endsection
