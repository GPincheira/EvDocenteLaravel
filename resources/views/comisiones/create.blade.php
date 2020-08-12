@extends('layouts.app')
<title>Crear Comision UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('comisiones.index') }}">Comisiones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Comision</li>
  </ol>
</nav>

{{--Boton con enlace para volver atras (al index)--}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nueva Comision</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('comisiones.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
        </div>
    </div>
</div>

{{--Mensaje de error si fuese el caso --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Se ha detectado un problema.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{--Formulario que luego de ser completado se envía a store de comisiones para ser procesado--}}
<form action="{{ route('comisiones.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Año:</strong>
                <input type="year" name="Año" class="form-control" placeholder="Ingrese el año">
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Fecha de comision:</strong>
                <input type="date" name="Fecha" class="form-control" placeholder="Ingrese la fecha">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Poner Como Comisión activa para este año:</strong>
                <select name="Estado" class="form-control">
                  <option value="Activo">Si</option>
                  <option value="Inactivo">No</option>
                </select>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre del participante 1:</strong>
                <input type="text" name="Nombre1" class="form-control" placeholder="Ingrese el nombre del primer integrante extra">
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Apellido Paterno del participante 1:</strong>
                <input type="text" name="APaterno1" class="form-control" placeholder="Apellido Paterno del segundo integrante extra">
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Apellido Materno del participante 1:</strong>
                <input type="text" name="AMaterno1" class="form-control" placeholder="Apellido Materno del primer integrante extra">
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre del participante 2:</strong>
                <input type="text" name="Nombre2" class="form-control" placeholder="Ingrese el nombre del segundo integrante extra">
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Apellido Paterno del participante 2:</strong>
                <input type="text" name="APaterno2" class="form-control" placeholder="Apellido Paterno del segundo integrante extra">
          </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Apellido Materno del participante 2:</strong>
                <input type="text" name="AMaterno2" class="form-control" placeholder="Apellido Materno del segundo integrante extra">
          </div>
        </div>

      {{--Boton para terminar el proceso--}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@endsection
