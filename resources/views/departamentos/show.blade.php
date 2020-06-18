@extends('layouts.app')
<title>Departamentos UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item"><a href="#">Departamentos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Departamento {{ $departamento->Nombre }}</li>
  </ol>
</nav>

  <h1>Codigo del Departamento: {{ $departamento->id }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('departamentos.index') }}"> Atras</a>
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
                <strong>Codigo de Facultad a la que pertenece:</strong>
                {{ $departamento->CodigoFacultad }}
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
