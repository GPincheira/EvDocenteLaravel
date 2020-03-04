@extends('comisiones.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nueva Comision</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('comisiones.index') }}"> Atras</a>
        </div>
    </div>
</div>

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

<form action="{{ route('comisiones.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Año:</strong>
                <input type="year" name="Año" class="form-control" placeholder="Ingrese el año">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de comision:</strong>
                <input type="timedate" name="Fecha" class="form-control" placeholder="Ingrese la fecha">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Facultad a la que pertenece:</strong>
                <input type="integer" name="CodigoFacultad" class="form-control" placeholder="Ingrese la facultad">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del participante 1:</strong>
                <input type="text" name="Nombre1" class="form-control" placeholder="Ingrese el nombre del primer integrante extra">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del participante 2:</strong>
                <input type="text" name="Nombre2" class="form-control" placeholder="Ingrese el nombre del segundo integrante extra">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>
@endsection
