@extends('facultades.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nueva Facultad</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('facultades.index') }}"> Atras</a>
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

<form action="{{ route('facultades.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="Nombre" class="form-control" placeholder="Ingrese el nombre de la Facultad">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Decano:</strong>
                <input type="text" name="DecanoNombre" class="form-control" placeholder="Ingrese el Nombre del Decano">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido Paterno Decano:</strong>
                <input type="text" name="DecanoAPaterno" class="form-control" placeholder="Ingrese Apellido Paterno del Decano">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido Materno Decano:</strong>
                <input type="text" name="DecanoAMaterno" class="form-control" placeholder="Ingrese Apellido Materno del Decano">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                <input type="text" name="Estado" class="form-control" placeholder="Estado">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>
@endsection
