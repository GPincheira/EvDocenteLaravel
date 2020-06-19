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

  <h1>ID de la Evaluacion: {{ $evaluacion->id }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('evaluaciones.index') }}"> Atras</a>
            </div>
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
