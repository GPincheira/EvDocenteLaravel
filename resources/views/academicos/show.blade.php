@extends('layouts.app')
<title>Academico {{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno[0] }}.</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('academicos.index') }}">Academicos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Academico: {{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno[0] }}.</li>
  </ol>
</nav>

{{--Se muestran los datos de un usuario en academico --}}
  <h1>RUT del Academico: {{ $academico->id }} - {{ $academico->verificador }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('academicos.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Academico:</strong>
                {{ $academico->Nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido Paterno:</strong>
                {{ $academico->ApellidoPaterno }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido Materno:</strong>
                {{ $academico->ApellidoMaterno }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo Profesional:</strong>
                {{ $academico->TituloProfesional }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Grado Academico:</strong>
                {{ $academico->GradoAcademico }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departamento:</strong>
                {{ $academico->CodigoDpto }}  - {{ $academico->departamento->Nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                {{ $academico->Categoria }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Horas de Contrato:</strong>
                {{ $academico->HorasContrato }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo de Planta:</strong>
                {{ $academico->TipoPlanta }}
            </div>
        </div>

  {{--Si el deleted_at (que guarda fecha de eliminacion) es nulo, se muestra como activo --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                  @if ($academico->deleted_at == NULL) Activo @else Inactivo @endif
            </div>
        </div>
    </div>
@endsection
