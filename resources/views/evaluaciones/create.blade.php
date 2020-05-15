@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Realizar nueva Evaluacion</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('evaluaciones.index') }}"> Atras</a>
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Instrucciones</div>
                    <div class="card-body">
                        Debe seleccionar la comision que aplicará la evaluación y el academico a evaluar. Solo se permiten permiten academicos de su facultad, y comisiones en las que está integrado.
                        <br>Los porcentajes deben sumar 100%, y las calificaciones van desde 1.0 hasta 5.0.
                        <br>ESCALA: Excelente=4.5 a 5 --- Muy Bueno=4.0 a 4.4 --- Bueno=3.5 a 3.9 --- Regular=2.7 a 3.4 --- Deficiente=menos de 2.7
                    </div>
                </div>
            </div>
        </div>
    </div>

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

  <strong>Actividades realizadas:</strong>

  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
    1. Actividades de docencia
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p1" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n1" class="form-control" placeholder="Nota 1">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    2. Actividades de Investigacion
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p2" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n2" class="form-control" placeholder="Nota 2">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    3. Extension y Vinculacion
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p3" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n3" class="form-control" placeholder="Nota 3">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    4. Administracion Academica
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p4" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n4" class="form-control" placeholder="Nota 4">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    5. Otras actividades realizadas
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p5" class="form-control" placeholder="tiempo asignado (%)">
      </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n5" class="form-control" placeholder="Nota 5">
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
