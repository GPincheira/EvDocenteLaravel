@extends('pdf.layout')

@section('content')
<div>
<div class="row content">
  <div class="col-lg-12 margin-tb">
    <h1>PAUTA RESUMEN</h1>
  </div>
</div>

<div class="row container">
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
						<td></td>
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
						<td>{{ $evaluacion->p1 }} %</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<td class="izq">2. Actividades de Investigación</td>
						<td>{{ $evaluacion->p2 }} %</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<td class="izq">3. Extension y Vinculación</td>
						<td>{{ $evaluacion->p3 }} %</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<td class="izq">4. Administración Académica</td>
						<td>{{ $evaluacion->p4 }} %</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<td class="izq">5. Otras actividades realizadas</td>
						<td>{{ $evaluacion->p5 }} %</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<th class="izq" colspan="7">Nota Final</th>
						<td></td>
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
            <div class="card card-active" style="background-color:rgba(200,200,200)">
                <div class="card-body">
                  <div class="col-md-3">
                    ESCALA:
                  </div>
                  <div class="col-md-3">
                    Excelente=4.5 a 5<br>
                    Regular=2.7 a 3.4
                  </div>
                  <div class="col-md-3">
                    Muy Bueno=4.0 a 4.4<br>
                    Deficiente=menos de 2.7
                  </div>
                  <div class="col-md-3">
                    Bueno=3.5 a 3.9
                  </div>
              </div>
          </div>
</div>
</div>

<div class="row container">
    <h3>IV. ARGUMENTOS DE LA CALIFICACION FINAL</h3>
</div>

<div class="row container">
      <h4 class="content">FIRMA COMISION:</h4>
</div>

<div class="row container">
  <div class="row">
  <div class="wrapper container">
    <div class="one">
      <table class="table table-bordered content">
          <tr>
            <td></td>
          </tr>
          <tr class="table-active">
            <td>Nombre y Firma</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>

<div class="row container">
      <h5>Fecha:</h5>
</div>

</div>

@endsection
