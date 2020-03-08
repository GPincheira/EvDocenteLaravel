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
                <strong>Año:</strong>
                {{ $comision->Año }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de comision:</strong>
                {{ $comision->Fecha }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Codigo de la Facultad:</strong>
                {{ $comision->CodigoFacultad }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Decano:</strong>
                {{ $comision->NombreDecano }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id del Secretario de Facultad:</strong>
                {{ $comision->idSecFacultad }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Secretario de Facultad:</strong>
                {{ $comision->NombreSecFacultad }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre participante 1:</strong>
                {{ $comision->Nombre1 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre participante 2:</strong>
                {{ $comision->Nombre2 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                {{ $comision->Estado }}
            </div>
        </div>
    </div>
@endsection
