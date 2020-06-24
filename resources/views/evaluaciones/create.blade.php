@extends('layouts.app')
<title>Crear Evaluacion UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('evaluaciones.index') }}">Evaluaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Evaluacion</li>
  </ol>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Realizar nueva Evaluacion</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('evaluaciones.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
        </div>
    </div>
</div>

@if (Session::has('message'))
<div class="alert alert-danger">{{Session::get('message')}}</div>
 @endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Se ha detectado un problema.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('evaluaciones.store') }}" method="POST">
    @csrf

  <div class="row">



    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Profesor a evaluar:</strong>
        <select name="RUTAcademico" class="form-control">
        @foreach ($departamentos as $departamento)
          @foreach($academicos as $academico)
            @if($academico->CodigoDpto == $departamento->id)
              <option value='{{$academico->id}}'>{{$academico->id}}-{{$academico->verificador}} {{$academico->Nombre}} {{$academico->ApellidoPaterno}} {{$academico->ApellidoMaterno}}</option>
            @endif
          @endforeach
        @endforeach
        </select>
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Comision Evaluadora:</strong>
        <select name="CodigoComision" class="form-control">
        @foreach ($comisiones as $comision)
            @if(@Auth::user()->secFacultad->CodigoFacultad == $comision->CodigoFacultad && $comision->Año == date("Y"))
                <option value='{{$comision->id}}'>{{$comision->id}} ( {{$comision->NombreDecano}} {{$comision->APaternoDecano}} - {{$comision->NombreSecFac}} {{$comision->APaternoSecFac}} - {{$comision->Nombre1}} {{$comision->APaterno1}} - {{$comision->Nombre2}} {{$comision->APaterno2}} ) </option>
            @endif
        @endforeach
        </select>
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
  						<td><input type="number" name="precio" class="form-control"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
  					</tr>
            <tr>
  						<td class="izq">2. Actividades de Investigación</td>
  						<td><input type="float" name="p2" class="form-control"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
  					</tr>
            <tr>
  						<td class="izq">3. Extension y Vinculación</td>
  						<td><input type="float" name="p3" class="form-control"></td>
              <td><input type="float" name="p3" class="form-control"></td>
              <td><input type="float" name="p3" class="form-control"></td>
              <td><input type="float" name="p3" class="form-control"></td>
              <td><input type="float" name="p3" class="form-control"></td>
              <td><input type="float" name="p3" class="form-control"></td
  					</tr>
            <tr>
  						<td class="izq">4. Administración Académica</td>
  						<td><input type="float" name="p4" class="form-control"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
  					</tr>
            <tr>
  						<td class="izq">5. Otras actividades realizadas</td>
  						<td><input type="float" name="p5" class="form-control"></td>
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



  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
    1. Actividades de docencia
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">

    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n1" class="form-control" placeholder="Nota 10">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 11">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 12">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 13">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 13">
    </div>
  </div>

  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
    2. Actividades de Investigacion
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p2" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n1" class="form-control" placeholder="Nota 10">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 11">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 12">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 13">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 13">
    </div>
  </div>

  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
    3. Extension y Vinculacion
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p3" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n1" class="form-control" placeholder="Nota 10">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 11">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 12">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 13">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 13">
    </div>
  </div>

  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
    4. Administracion Academica
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p4" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n1" class="form-control" placeholder="Nota 10">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 11">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 12">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 13">
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
            <input type="float" name="n2" class="form-control" placeholder="Nota 13">
    </div>
  </div>

  <div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
    5. Otras actividades realizadas
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p5" class="form-control" placeholder="tiempo asignado (%)">
      </div>
      <div class="col-xs-1 col-sm-1 col-md-1">
              <input type="float" name="n1" class="form-control" placeholder="Nota 10">
      </div>
      <div class="col-xs-1 col-sm-1 col-md-1">
              <input type="float" name="n2" class="form-control" placeholder="Nota 11">
      </div>
      <div class="col-xs-1 col-sm-1 col-md-1">
              <input type="float" name="n2" class="form-control" placeholder="Nota 12">
      </div>
      <div class="col-xs-1 col-sm-1 col-md-1">
              <input type="float" name="n2" class="form-control" placeholder="Nota 13">
      </div>
      <div class="col-xs-1 col-sm-1 col-md-1">
              <input type="float" name="n2" class="form-control" placeholder="Nota 13">
      </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Argumento:</strong>
          <textarea type="msg" name="Argumento" class="form-control" placeholder="Escriba su argumento" ></textarea>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</div>

</form>
@endsection
