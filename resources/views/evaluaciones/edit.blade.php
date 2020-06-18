@extends('layouts.app')
<title>Editar Evaluacion UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('evaluaciones.index') }}">Evaluaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Evaluacion {{ $evaluacion->id }}</li>
  </ol>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Evaluacion</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('evaluaciones.index') }}"> Atras</a>
        </div>
    </div>
</div>

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

<form action="{{ route('evaluaciones.update',$evaluacion->id) }}" method="POST">
    @csrf
    @method('PUT')
  <div class="row">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Instrucciones</div>
                    <div class="card-body">
                        Los porcentajes deben sumar 100%, y las calificaciones van desde 1.0 hasta 5.0.
                        <br>ESCALA: Excelente=4.5 a 5 --- Muy Bueno=4.0 a 4.4 --- Bueno=3.5 a 3.9 --- Regular=2.7 a 3.4 --- Deficiente=menos de 2.7
                    </div>
                </div>
            </div>
        </div>
    </div>

  <strong>Actividades realizadas:</strong>

  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
    1. Actividades de docencia
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p1" value="{{ $evaluacion->p1 }}" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n1" value="{{ $evaluacion->n1 }}" class="form-control" placeholder="Nota 1">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    2. Actividades de Investigacion
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p2" value="{{ $evaluacion->p2 }}" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n2" value="{{ $evaluacion->n2 }}" class="form-control" placeholder="Nota 2">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    3. Extension y Vinculacion
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p3" value="{{ $evaluacion->p3 }}" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n3" value="{{ $evaluacion->n3 }}" class="form-control" placeholder="Nota 3">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    4. Administracion Academica
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p4" value="{{ $evaluacion->p4 }}" class="form-control" placeholder="tiempo asignado (%)">
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n4" value="{{ $evaluacion->n4 }}" class="form-control" placeholder="Nota 4">
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
    5. Otras actividades realizadas
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="p5" value="{{ $evaluacion->p5 }}" class="form-control" placeholder="tiempo asignado (%)">
      </div>
    <div class="col-xs-2 col-sm-2 col-md-2">
            <input type="float" name="n5" value="{{ $evaluacion->n5 }}" class="form-control" placeholder="Nota 5">
      </div>
  </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Argumento:</strong>
                <textarea type="msg" name="Argumento" value="{{ $evaluacion->Argumento }}" class="form-control" placeholder="Escriba su argumento" ></textarea>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>
@endsection
