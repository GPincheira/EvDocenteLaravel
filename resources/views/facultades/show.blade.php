@extends('layouts.app')
<title>{{ $facultad->Nombre }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('facultades.index') }}">Facultades</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $facultad->Nombre }}</li>
  </ol>
</nav>

  <h1>Codigo de Facultad: {{ $facultad->id }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('facultades.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de la Facultad:</strong>
                {{ $facultad->Nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Decano:</strong>
                {{ $facultad->DecanoNombre }} {{ $facultad->DecanoAPaterno }} {{ $facultad->DecanoAMaterno }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                  @if ($facultad->deleted_at == NULL) Activa @else Inactiva @endif
            </div>
        </div>
    </div>
@endsection
