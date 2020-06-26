@extends('layouts.app')
<title>Evaluacion  {{ $evaluacion->id }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('evaluaciones.index') }}">Evaluaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Evaluacion  {{ $evaluacion->id }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>ID de la Evaluacion: {{ $evaluacion->id }}</h2>
    </div>
    <div class="pull-right">
        <a href="{{ route('evaluaciones.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
    </div>
  </div>
</div>

<div class="row content">
  <div class="col-lg-12 margin-tb">
    <h1>PAUTA RESUMEN</h1>
  </div>
</div>

<div class="row container">
    <h3>I. IDENTIFICACION</h3>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered content">
				<tbody>
					<tr>
						<td height=40>{{ $evaluacion->academico->Nombre }} {{ $evaluacion->academico->ApellidoPaterno }} {{ $evaluacion->academico->ApellidoMaterno }}</td>
						<td>{{ $evaluacion->academico->departamento->id }} - {{ $evaluacion->academico->departamento->Nombre }}</td>
					</tr>
          <tr class="table-active">
						<td width="50%">Académico</td>
						<td width="50%">Departamento</td>
					</tr>
          <tr high="20px">
						<td height=40>{{ $evaluacion->academico->departamento->facultad->id }} - {{ $evaluacion->academico->departamento->facultad->Nombre }}</td>
						<td>{{ $evaluacion->año }}</td>
					</tr>
          <tr class="table-active" height="4%">
						<td>Facultad o Instituto al que pertenece</td>
						<td>Periodo que se evalua</td>
					</tr>
          <tr>
						<td height=40>{{ $evaluacion->academico->TituloProfesional }}</td>
						<td>{{ $evaluacion->academico->HorasContrato }}</td>
					</tr>
          <tr class="table-active">
						<td>Título Profesional</td>
						<td>Horas de Contrato</td>
					</tr>
          <tr>
						<td height=40>{{ $evaluacion->academico->Categoria }}</td>
						<td>{{ $evaluacion->academico->GradoAcademico }}</td>
					</tr>
          <tr class="table-active">
						<td>Categoría</td>
						<td>Grado Académico</td>
					</tr>
          <tr>
						<td height=40>
              @foreach ($evs as $ev)
                @if ( $ev->academico->id == $evaluacion->academico->id && $ev->año < $evaluacion->año )
                  {{ $ev->NotaFinal }}
                @endif
              @endforeach
            </td>
						<td>{{ $evaluacion->academico->TipoPlanta }}</td>
					</tr>
          <tr class="table-active">
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

<div class="container">
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
        <div class="col-md-12 margin-tb container">
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
    <div class="col-md-12 margin-tb container">
        <div class="card card-active" style="background-color:white">
            <div class="card-body">
              {{ $evaluacion->Argumento }}
            </div>
          </div>
      </div>
  </div>

<div class="col-md-12 container">
      <h5 class="content">FIRMA COMISION:</h5>
  </div>

  <div class="wrapper container">
    <div class="one">
      <table class="table table-bordered content">
          <tr>
            <td height=100>Integrante 1: {{ $evaluacion->comision->Nombre1 }} {{ $evaluacion->comision->APaterno1 }} {{ $evaluacion->comision->AMaterno1 }}</td>
          </tr>
          <tr class="table-active">
            <td>Nombre y Firma</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="two">
      <table class="table table-bordered content">
          <tr>
            <td height=100>Integrante 2: {{ $evaluacion->comision->Nombre2 }} {{ $evaluacion->comision->APaterno2 }} {{ $evaluacion->comision->AMaterno2 }}</td>
          </tr>
          <tr class="table-active">
            <td>Nombre y Firma</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="three">
      <table class="table table-bordered content">
          <tr>
            <td height=100>Secretario de Facultad:  {{ $evaluacion->comision->NombreSecFac }} {{ $evaluacion->comision->APaternoSecFac }} {{ $evaluacion->comision->AMaternoSecFac }}</td>
          </tr>
          <tr class="table-active">
            <td>Nombre y Firma</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="four">
      <table class="table table-bordered content">
          <tr>
            <td height=100>Decano: {{ $evaluacion->comision->NombreDecano }} {{ $evaluacion->comision->APaternoDecano }} {{ $evaluacion->comision->AMaternoDecano }}</td>
          </tr>
          <tr class="table-active">
            <td>Nombre y Firma</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="fecha">
      <br><br><br><br><h5>Fecha: {{ $evaluacion->comision->Fecha }}</h5>
    </div>
  </div>




@endsection
