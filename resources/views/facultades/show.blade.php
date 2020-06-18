@extends('layouts.app')
<title>Facultades UCM</title>
@section('content')
  <h1>Codigo de Facultad: {{ $facultad->id }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('facultades.index') }}"> Atras</a>
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
