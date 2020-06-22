@extends('layouts.app')
<title>Evaluacion {{ $evaluacion->id }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('evaluaciones.index') }}">Evaluaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Evaluacion {{ $evaluacion->id }}</li>
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
						<td></td>
						<td></td>
					</tr>
          <tr class="table-active">
						<td width="50%">Académico</td>
						<td width="50%">Departamento</td>
					</tr>
          <tr>
						<td></td>
						<td></td>
					</tr>
          <tr class="table-active">
						<td>Facultad o Instituto al que pertenece</td>
						<td>Periodo que se evalua</td>
					</tr>
          <tr>
						<td></td>
						<td></td>
					</tr>
          <tr class="table-active">
						<td>Título Profesional</td>
						<td>Horas de Contrato</td>
					</tr>
          <tr>
						<td></td>
						<td></td>
					</tr>
          <tr class="table-active">
						<td>Categoría</td>
						<td>Grado Académico</td>
					</tr>
          <tr>
						<td></td>
						<td></td>
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
						<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<td class="izq">2. Actividades de Investigación</td>
						<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<td class="izq">3. Extension y Vinculación</td>
						<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<td class="izq">4. Administración Académica</td>
						<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
					</tr>
          <tr>
						<td class="izq">5. Otras actividades realizadas</td>
						<td></td>
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
</div>

<div class="col-md-12 container">
      <h4 class="content">FIRMA COMISION:</h4>
  </div>

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
    <div class="two">
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
    <div class="three">
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
    <div class="four">
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

<div class="col-md-12 container">
  <div class="pull-left">
      <h5>Fecha:</h5>
  </div>
</div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CodigoComision:</strong>
                {{ $evaluacion->CodigoComision }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>RUT del Academico:</strong>
                {{ $evaluacion->RUTAcademico }}
            </div>
        </div>

        <strong>Actividades realizadas:</strong>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
          1. Actividades de docencia
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  {{ $evaluacion->p1 }} %
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  Nota:{{ $evaluacion->n1 }}
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
          2. Actividades de Investigacion
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  {{ $evaluacion->p2 }} %
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  Nota:{{ $evaluacion->n2 }}
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
          3. Extension y Vinculacion
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  {{ $evaluacion->p3 }} %
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  Nota:{{ $evaluacion->n3 }}
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
          4. Administracion Academica
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  {{ $evaluacion->p4 }} %
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  Nota:{{ $evaluacion->n4 }}
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6">
          5. Otras actividades realizadas
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  {{ $evaluacion->p5 }} %
            </div>
          <div class="col-xs-2 col-sm-2 col-md-2">
                  Nota:{{ $evaluacion->n5 }}
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <br><strong>Nota Final Obtenida:</strong>
            {{ $evaluacion->NotaFinal }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Argumento:</strong>
            {{ $evaluacion->Argumento }}
        </div>
    </div>
@endsection
