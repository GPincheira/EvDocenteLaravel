@extends('layouts.app')

@section('content')
  <h1>Codigo de la Comision: {{ $comision->id }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('comisiones.index') }}"> Atras</a>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Facultad:</strong>
              {{ $comision->CodigoFacultad }}
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
                <strong>Facultad:</strong>
                {{ $comision->CodigoFacultad }}
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
