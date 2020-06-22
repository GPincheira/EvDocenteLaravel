@extends('layouts.app')
<title>{{ $departamento->Nombre }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('departamentos.index') }}">Departamentos</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $departamento->Nombre }}</li>
  </ol>
</nav>

  <h1>Codigo del Departamento: {{ $departamento->id }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('departamentos.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Departamento:</strong>
                {{ $departamento->Nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Facultad a la que pertenece:</strong>
                {{ $departamento->CodigoFacultad }} - {{ $departamento->facultad->Nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                  @if ($departamento->deleted_at == NULL) Activo @else Inactivo @endif
            </div>
        </div>
    </div>
@endsection
