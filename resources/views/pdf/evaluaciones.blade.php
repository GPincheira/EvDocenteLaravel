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
  <div class="col-md-12 content">
    <h3>PAUTA RESUMEN</h3>
  </div>
</div>

<div class="row container">
    <h4>I. IDENTIFICACION</h4>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table style="width:100%">
				<tbody>
					<tr>
						<td>{{ $evaluacion->academico->Nombres }} {{ $evaluacion->academico->ApellidoPaterno }} {{ $evaluacion->academico->ApellidoMaterno }}</td>
						<td>{{ $evaluacion->academico->departamento->Nombre }}</td>
					</tr>
          <tr style="background-color:rgba(200,200,200)">
						<td width="50%">Académico</td>
						<td width="50%">Departamento</td>
					</tr>
          <tr>
						<td>{{ $evaluacion->academico->departamento->facultad->Nombre }}</td>
						<td>{{ $evaluacion->comision->Año }}</td>
					</tr>
          <tr style="background-color:rgba(200,200,200)">
						<td>Facultad o Instituto al que pertenece</td>
						<td>Periodo que se evalua</td>
					</tr>
          <tr>
						<td>{{ $evaluacion->academico->TituloProfesional }}</td>
						<td>{{ $evaluacion->academico->HorasContrato }}</td>
					</tr>
          <tr style="background-color:rgba(200,200,200)">
						<td>Título Profesional</td>
						<td>Horas de Contrato</td>
					</tr>
          <tr>
						<td>{{ $evaluacion->academico->Categoria }}</td>
						<td>{{ $evaluacion->academico->GradoAcademico }}</td>
					</tr>
          <tr style="background-color:rgba(200,200,200)">
						<td>Categoría</td>
						<td>Grado Académico</td>
					</tr>
          <tr>
            <td>@if ($ultima) {{ $ultima->NotaFinal }} @endif</td>
						<td>{{ $evaluacion->academico->TipoPlanta }}</td>
					</tr>
          <tr style="background-color:rgba(200,200,200)">
						<td>Calificación Anterior</td>
						<td>Tipo de Planta</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row container" style="margin-top: 8px">
    <h4>II. CALIFICACION ACADEMICA</h4>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table style="width:100%">
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
            <td>@if(($evaluacion->n1 >= 4.5) && ($evaluacion->n1 <= 5)) {{ $evaluacion->n1 }} @endif</td>
            <td>@if(($evaluacion->n1 >= 4.0) && ($evaluacion->n1 <= 4.4)) {{ $evaluacion->n1 }} @endif</td>
            <td>@if(($evaluacion->n1 >= 3.5) && ($evaluacion->n1 <= 3.9)) {{ $evaluacion->n1 }} @endif</td>
            <td>@if(($evaluacion->n1 >= 2.7) && ($evaluacion->n1 <= 3.4)) {{ $evaluacion->n1 }} @endif</td>
            <td>@if(($evaluacion->n1 > 0) && ($evaluacion->n1 < 2.7)) {{ $evaluacion->n1 }} @endif</td>
            <td>{{ $evaluacion->n1 * ($evaluacion->p1/100) }}</td>
					</tr>
          <tr>
						<td class="izq">2. Actividades de Investigación</td>
						<td>{{ $evaluacion->p2 }}</td>
            <td>@if(($evaluacion->n2 >= 4.5) && ($evaluacion->n2 <= 5)) {{ $evaluacion->n2 }} @endif</td>
            <td>@if(($evaluacion->n2 >= 4.0) && ($evaluacion->n2 <= 4.4)) {{ $evaluacion->n2 }} @endif</td>
            <td>@if(($evaluacion->n2 >= 3.5) && ($evaluacion->n2 <= 3.9)) {{ $evaluacion->n2 }} @endif</td>
            <td>@if(($evaluacion->n2 >= 2.7) && ($evaluacion->n2 <= 3.4)) {{ $evaluacion->n2 }} @endif</td>
            <td>@if(($evaluacion->n2 > 0) && ($evaluacion->n2 < 2.7)) {{ $evaluacion->n2 }} @endif</td>
            <td>{{ $evaluacion->n2 * ($evaluacion->p2/100) }}</td>
					</tr>
          <tr>
						<td class="izq">3. Extension y Vinculación</td>
						<td>{{ $evaluacion->p3 }}</td>
            <td>@if(($evaluacion->n3 >= 4.5) && ($evaluacion->n3 <= 5)) {{ $evaluacion->n3 }} @endif</td>
            <td>@if(($evaluacion->n3 >= 4.0) && ($evaluacion->n3 <= 4.4)) {{ $evaluacion->n3 }} @endif</td>
            <td>@if(($evaluacion->n3 >= 3.5) && ($evaluacion->n3 <= 3.9)) {{ $evaluacion->n3 }} @endif</td>
            <td>@if(($evaluacion->n3 >= 2.7) && ($evaluacion->n3 <= 3.4)) {{ $evaluacion->n3 }} @endif</td>
            <td>@if(($evaluacion->n3 > 0) && ($evaluacion->n3 < 2.7)) {{ $evaluacion->n3 }} @endif</td>
            <td>{{ $evaluacion->n3 * ($evaluacion->p3/100) }}</td>
					</tr>
          <tr>
						<td class="izq">4. Administración Académica</td>
						<td>{{ $evaluacion->p4 }}</td>
            <td>@if(($evaluacion->n4 >= 4.5) && ($evaluacion->n4 <= 5)) {{ $evaluacion->n4 }} @endif</td>
            <td>@if(($evaluacion->n4 >= 4.0) && ($evaluacion->n4 <= 4.4)) {{ $evaluacion->n4 }} @endif</td>
            <td>@if(($evaluacion->n4 >= 3.5) && ($evaluacion->n4 <= 3.9)) {{ $evaluacion->n4 }} @endif</td>
            <td>@if(($evaluacion->n4 >= 2.7) && ($evaluacion->n4 <= 3.4)) {{ $evaluacion->n4 }} @endif</td>
            <td>@if(($evaluacion->n4 > 0) && ($evaluacion->n4 < 2.7)) {{ $evaluacion->n4 }} @endif</td>
            <td>{{ $evaluacion->n4 * ($evaluacion->p4/100) }}</td>
					</tr>
          <tr>
						<td class="izq">5. Otras actividades realizadas</td>
						<td>{{ $evaluacion->p5 }}</td>
            <td>@if(($evaluacion->n5 >= 4.5) && ($evaluacion->n5 <= 5)) {{ $evaluacion->n5 }} @endif</td>
            <td>@if(($evaluacion->n5 >= 4.0) && ($evaluacion->n5 <= 4.4)) {{ $evaluacion->n5 }} @endif</td>
            <td>@if(($evaluacion->n5 >= 3.5) && ($evaluacion->n5 <= 3.9)) {{ $evaluacion->n5 }} @endif</td>
            <td>@if(($evaluacion->n5 >= 2.7) && ($evaluacion->n5 <= 3.4)) {{ $evaluacion->n5 }} @endif</td>
            <td>@if(($evaluacion->n5 > 0) && ($evaluacion->n5 < 2.7)) {{ $evaluacion->n5 }} @endif</td>
            <td>{{ $evaluacion->n5 * ($evaluacion->p5/100) }}</td>
					</tr>
          <tr>
						<th class="izq" colspan="7">Nota Final
              @if($evaluacion->NotaFinal >= 4.5) (Excelente)
              @elseif ($evaluacion->NotaFinal >= 4.0) (Muy Bueno)
              @elseif ($evaluacion->NotaFinal >= 3.5) (Bueno)
              @elseif ($evaluacion->NotaFinal >= 2.7) (Regular)
              @else (Deficiente)
              @endif
            </th>
						<td>{{ $evaluacion->NotaFinal }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row container" style="margin-top: 8px">
    <h4>III. ESCALA EVALUATIVA</h4>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table class="table-bordered" style="width:100%">
				<tbody>
          <tr style="background-color:rgba(200,200,200)">
						<td width="25%">ESCALA:</td>
						<td>Excelente=4.5 a 5</td>
            <td>Muy Bueno=4.0 a 4.4</td>
						<td>Bueno=3.5 a 3.9</td>
					</tr>
          <tr style="background-color:rgba(200,200,200)">
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

<div class="row container" style="margin-top: 7px">
    <h4>IV. ARGUMENTOS DE LA CALIFICACION FINAL</h4>
    <p>{{ $evaluacion->Argumento }}</p>
</div><br>

<div class="row container">
      <h5 class="content">FIRMA COMISION:</h5>
</div>

<div class="row container">
	<div class="row">
		<div class="col-md-12">
			<table class="table-bordered" style="width:100%">
				<tbody>
          <tr>
						<td width="33%" height="40">Integrante 1: {{ $evaluacion->comision->Nombre1 }} {{ $evaluacion->comision->APaterno1 }} {{ $evaluacion->comision->AMaterno1 }}</td>
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
</div>

  <div class="row container" style="margin-left:325pt;">
  	<div class="row">
  		<div class="col-md-3">
  			<table class="table-bordered" style="width:100%">
  				<tbody>
            <tr>
              <td width="33%" height="40">Decano: {{ $evaluacion->comision->NombreDecano }} {{ $evaluacion->comision->APaternoDecano }} {{ $evaluacion->comision->AMaternoDecano }}</td>
  					</tr>
            <tr class="table-active">
              <td style="background-color:rgba(200,200,200)">Nombre y Firma</td>
  					</tr>
  				</tbody>
  			</table>
  		</div>
  	</div>
  </div>

<div class="row container">
      <h5>Fecha: {{ $evaluacion->comision->Fecha }}</h5>
</div>

</div>

@endsection
