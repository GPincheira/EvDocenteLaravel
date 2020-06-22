@extends('layouts.app')
<title>Comision {{ $comision->id }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('comisiones.index') }}">Comisiones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Comision {{ $comision->id }}</li>
  </ol>
</nav>

  <h1>Codigo de la Comision: {{ $comision->id }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{ route('comisiones.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Facultad:</strong>
              {{ $comision->CodigoFacultad }} - {{ $comision->facultad->Nombre }}
          </div>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Año:</strong>
                {{ $comision->Año }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Decano:</strong>
                {{ $comision->NombreDecano }} {{ $comision->APaternoDecano }} {{ $comision->AMaternoDecano }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Secretario de Facultad:</strong>
                {{ $comision->NombreSecFac }} {{ $comision->APaternoSecFac }} {{ $comision->AMaternoSecFac }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Integrante 3:</strong>
                {{ $comision->Nombre1 }} {{ $comision->APaterno1 }} {{ $comision->AMaterno1 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Integrante 4:</strong>
                {{ $comision->Nombre2 }} {{ $comision->APaterno2 }} {{ $comision->AMaterno2 }}
            </div>
        </div>
    </div>
@endsection
