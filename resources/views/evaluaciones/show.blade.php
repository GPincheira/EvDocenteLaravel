@extends('evaluaciones.layout')

@section('content')
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Argumento:</strong>
                {{ $evaluacion->Argumento }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota Final:</strong>
                {{ $comision->NotaFinal }}
            </div>
        </div>
    </div>
@endsection
