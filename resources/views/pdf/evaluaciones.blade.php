@extends('pdf.layout')

@section('content')
<div>

  <div class="row container">
  	<div class="row">
  		<div class="col-md-4">
  			<img src="http://www.portalalumnos.ucm.cl/v2/assets/img/logo-ucm.jpg" class="logo" width="200" height="70"/>
  		</div>
  	</div>
  </div>



<div class="row content">
  <div class="col-lg-12 margin-tb">
    <h1>PAUTA RESUMEN</h1>
  </div>
</div>

<br><div class="row container">
    <h3>I. IDENTIFICACION</h3>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered content">
				<tbody>
					<tr>
						<td>{{ $evaluacion->academico->Nombre }} {{ $evaluacion->academico->ApellidoPaterno }} {{ $evaluacion->academico->ApellidoMaterno }}</td>
						<td>{{ $evaluacion->academico->departamento->Nombre }}</td>
					</tr>
          <tr class="table-active" style="background-color:rgba(200,200,200)">
						<td width="50%">Académico</td>
						<td width="50%">Departamento</td>
					</tr>
          <tr>
						<td>{{ $evaluacion->academico->departamento->facultad->Nombre }}</td>
						<td>{{ $evaluacion->comision->Año }}</td>
					</tr>
          <tr class="table-active" style="background-color:rgba(200,200,200)">
						<td>Facultad o Instituto al que pertenece</td>
						<td>Periodo que se evalua</td>
					</tr>
          <tr>
						<td>{{ $evaluacion->academico->TituloProfesional }}</td>
						<td>{{ $evaluacion->academico->HorasContrato }}</td>
					</tr>
          <tr class="table-active" style="background-color:rgba(200,200,200)">
						<td>Título Profesional</td>
						<td>Horas de Contrato</td>
					</tr>
          <tr>
						<td>{{ $evaluacion->academico->Categoria }}</td>
						<td>{{ $evaluacion->academico->GradoAcademico }}</td>
					</tr>
          <tr class="table-active" style="background-color:rgba(200,200,200)">
						<td>Categoría</td>
						<td>Grado Académico</td>
					</tr>
          <tr>
            <td>
              @foreach ($evs as $ev)
                @if ( $ev->RUTAcademico == $evaluacion->RUTAcademico && $ev->año < $evaluacion->año)
                  {{ $ev->NotaFinal }}
                @endif
              @endforeach
            </td>
						<td>{{ $evaluacion->academico->TipoPlanta }}</td>
					</tr>
          <tr class="table-active" style="background-color:rgba(200,200,200)">
						<td>Calificación Anterior</td>
						<td>Tipo de Planta</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row container">
    <h3>II. CALIFICACION ACADEMICA</h3>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered content">
				<tbody>
          <tr>
						<th rowspan="2" width="32%"></th>
						<th rowspan="2" width="20%">% tiempo asignado a tareas programadas</th>
            <th colspan="5" width="40%">Calificacion</th>
            <th width="8%">Pond</th>
					</tr>
          <tr>
  					<th width="8%">E</th>
  					<th width="8%">MB</th>
    				<th width="8%">B</th>
    				<th width="8%">R</th>
        		<th width="8%">I</th>
            <th>%T*C/100</th>
  			  </tr>
          <tr>
						<td class="izq">1. Actividades de Docencia</td>
						<td>{{ $evaluacion->p1 }}</td>
            <td>@if(($evaluacion->n1 > 0) && ($evaluacion->n1 < 2.7)) {{ $evaluacion->n1 }} @endif</td>
            <td>@if(($evaluacion->n1 >= 2.7) && ($evaluacion->n1 <= 3.4)) {{ $evaluacion->n1 }} @endif</td>
            <td>@if(($evaluacion->n1 >= 3.5) && ($evaluacion->n1 <= 3.9)) {{ $evaluacion->n1 }} @endif</td>
            <td>@if(($evaluacion->n1 >= 4.0) && ($evaluacion->n1 <= 4.4)) {{ $evaluacion->n1 }} @endif</td>
            <td>@if(($evaluacion->n1 >= 4.5) && ($evaluacion->n1 <= 5)) {{ $evaluacion->n1 }} @endif</td>
            <td>{{ $evaluacion->n1 * ($evaluacion->p1/100) }}</td>
					</tr>
          <tr>
						<td class="izq">2. Actividades de Investigación</td>
						<td>{{ $evaluacion->p2 }}</td>
            <td>@if(($evaluacion->n2 > 0) && ($evaluacion->n2 < 2.7)) {{ $evaluacion->n2 }} @endif</td>
            <td>@if(($evaluacion->n2 >= 2.7) && ($evaluacion->n2 <= 3.4)) {{ $evaluacion->n2 }} @endif</td>
            <td>@if(($evaluacion->n2 >= 3.5) && ($evaluacion->n2 <= 3.9)) {{ $evaluacion->n2 }} @endif</td>
            <td>@if(($evaluacion->n2 >= 4.0) && ($evaluacion->n2 <= 4.4)) {{ $evaluacion->n2 }} @endif</td>
            <td>@if(($evaluacion->n2 >= 4.5) && ($evaluacion->n2 <= 5)) {{ $evaluacion->n2 }} @endif</td>
            <td>{{ $evaluacion->n2 * ($evaluacion->p2/100) }}</td>
					</tr>
          <tr>
						<td class="izq">3. Extension y Vinculación</td>
						<td>{{ $evaluacion->p3 }}</td>
            <td>@if(($evaluacion->n3 > 0) && ($evaluacion->n3 < 2.7)) {{ $evaluacion->n3 }} @endif</td>
            <td>@if(($evaluacion->n3 >= 2.7) && ($evaluacion->n3 <= 3.4)) {{ $evaluacion->n3 }} @endif</td>
            <td>@if(($evaluacion->n3 >= 3.5) && ($evaluacion->n3 <= 3.9)) {{ $evaluacion->n3 }} @endif</td>
            <td>@if(($evaluacion->n3 >= 4.0) && ($evaluacion->n3 <= 4.4)) {{ $evaluacion->n3 }} @endif</td>
            <td>@if(($evaluacion->n3 >= 4.5) && ($evaluacion->n3 <= 5)) {{ $evaluacion->n3 }} @endif</td>
            <td>{{ $evaluacion->n3 * ($evaluacion->p3/100) }}</td>
					</tr>
          <tr>
						<td class="izq">4. Administración Académica</td>
						<td>{{ $evaluacion->p4 }}</td>
            <td>@if(($evaluacion->n4 > 0) && ($evaluacion->n4 < 2.7)) {{ $evaluacion->n4 }} @endif</td>
            <td>@if(($evaluacion->n4 >= 2.7) && ($evaluacion->n4 <= 3.4)) {{ $evaluacion->n4 }} @endif</td>
            <td>@if(($evaluacion->n4 >= 3.5) && ($evaluacion->n4 <= 3.9)) {{ $evaluacion->n4 }} @endif</td>
            <td>@if(($evaluacion->n4 >= 4.0) && ($evaluacion->n4 <= 4.4)) {{ $evaluacion->n4 }} @endif</td>
            <td>@if(($evaluacion->n4 >= 4.5) && ($evaluacion->n4 <= 5)) {{ $evaluacion->n4 }} @endif</td>
            <td>{{ $evaluacion->n4 * ($evaluacion->p4/100) }}</td>
					</tr>
          <tr>
						<td class="izq">5. Otras actividades realizadas</td>
						<td>{{ $evaluacion->p5 }}</td>
            <td>@if(($evaluacion->n5 > 0) && ($evaluacion->n5 < 2.7)) {{ $evaluacion->n5 }} @endif</td>
            <td>@if(($evaluacion->n5 >= 2.7) && ($evaluacion->n5 <= 3.4)) {{ $evaluacion->n5 }} @endif</td>
            <td>@if(($evaluacion->n5 >= 3.5) && ($evaluacion->n5 <= 3.9)) {{ $evaluacion->n5 }} @endif</td>
            <td>@if(($evaluacion->n5 >= 4.0) && ($evaluacion->n5 <= 4.4)) {{ $evaluacion->n5 }} @endif</td>
            <td>@if(($evaluacion->n5 >= 4.5) && ($evaluacion->n5 <= 5)) {{ $evaluacion->n5 }} @endif</td>
            <td>{{ $evaluacion->n5 * ($evaluacion->p5/100) }}</td>
					</tr>
          <tr>
						<th class="izq" colspan="7">Nota Final</th>
						<td>{{ $evaluacion->NotaFinal }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row container">
    <h3>III. ESCALA EVALUATIVA</h3>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table class="table border="0" content">
				<tbody>
          <tr class="table-active" style="background-color:rgba(200,200,200)">
						<td width="25%">ESCALA:</td>
						<td>Excelente=4.5 a 5</td>
            <td>Muy Bueno=4.0 a 4.4</td>
						<td>Bueno=3.5 a 3.9</td>
					</tr>
          <tr class="table-active" style="background-color:rgba(200,200,200)">
						<td width="25%"></td>
						<td>Regular=2.7 a 3.4</td>
						<td>Deficiente=menos de 2.7</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row container">
    <h3>IV. ARGUMENTOS DE LA CALIFICACION FINAL</h3>
    <p>{{ $evaluacion->Argumento }}</p>
</div><br><br>

<div class="row container">
      <h4 class="content">FIRMA COMISION:</h4>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered content">
				<tbody>
          <tr>
						<td width="33%" height="60">Integrante 1: {{ $evaluacion->comision->Nombre1 }} {{ $evaluacion->comision->APaterno1 }} {{ $evaluacion->comision->AMaterno1 }}</td>
						<td width="33%">Integrante 2: {{ $evaluacion->comision->Nombre2 }} {{ $evaluacion->comision->APaterno2 }} {{ $evaluacion->comision->AMaterno2 }}</td>
						<td width="33%">Secretario de Facultad:  {{ $evaluacion->comision->NombreSecFac }} {{ $evaluacion->comision->APaternoSecFac }} {{ $evaluacion->comision->AMaternoSecFac }}</td>
					</tr>
          <tr class="table-active" style="background-color:rgba(200,200,200)">
						<td>Nombre y Firma</td>
						<td>Nombre y Firma</td>
            <td>Nombre y Firma</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

  <div class="row container">
  	<div class="row">
  		<div class="col-md-3">
  			<table class="table table-bordered content">
  				<tbody>
            <tr>
  						<td width="33%" height="60"></td>
              <td width="33%"></td>
              <td width="33%">Decano: {{ $evaluacion->comision->NombreDecano }} {{ $evaluacion->comision->APaternoDecano }} {{ $evaluacion->comision->AMaternoDecano }}</td>
  					</tr>
            <tr class="table-active">
  						<td></td>
              <td></td>
              <td style="background-color:rgba(200,200,200)">Nombre y Firma</td>
  					</tr>
  				</tbody>
  			</table>
  		</div>
  	</div>

<div class="row container">
      <h5>Fecha: {{ $evaluacion->comision->Fecha }}</h5>
</div>

</div>

@endsection
