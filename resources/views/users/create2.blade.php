@extends('layouts.app')
<title>Crear Sec de Facultad UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index2') }}">Secretarios de Facultad</a></li>
    <li class="breadcrumb-item active" aria-current="page">Agregar Secretario de Facultad</li>
  </ol>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo Secretario de Facultad</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('users.index2') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
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

<form action="{{ route('users.store2') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <strong>RUT:</strong>
                <input type="integer" name="id" class="form-control" placeholder="Ingrese el RUT">
            </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1">
            <div class="form-group">
                <br><input type="text" name="verificador" class="form-control">
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="Nombre" class="form-control" placeholder="Ingrese Nombre">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <br><input type="text" name="ApellidoPaterno" class="form-control" placeholder="Ingrese Apellido Paterno">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <br><input type="text" name="ApellidoMaterno" class="form-control" placeholder="Ingrese Apellido Materno">
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Ingrese el Email">
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contraseña:</strong>
                <input type="password" name="password" class="form-control" placeholder="Ingrese la Contraseña">
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Facultad a la que pertenece:</strong>
                <select name="CodigoFacultad" class="form-control" required>
                  <option value="">SELECCIONE LA FACULTAD</option>
                  @foreach($facultades as $facultad)
                    <option value='{{$facultad->id}}'>{{$facultad->id}} - {{$facultad->Nombre}}</option>
                  @endforeach
                </select>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                <select name="deleted_at" class="form-control">
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
             <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </div>
</form>
@endsection
