@extends('layouts.app')
<title>Crear Departamento UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('departamentos.index') }}">Departamentos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Departamento</li>
  </ol>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo Departamento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('departamentos.index') }}"> Atras</a>
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

<form action="{{ route('departamentos.store') }}" method="POST">
    @csrf

       <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>Codigo:</strong>
                 <input type="integer" name="id" class="form-control" placeholder="Ingrese el Codigo del Departamento">
             </div>
         </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="Nombre" class="form-control" placeholder="Ingrese el nombre del Departamento">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Facultad a la que pertenece:</strong>
                <select name="CodigoFacultad" class="form-control">
                  @foreach($facultades as $facultad)
                  <option value='{{$facultad->id}}'>{{$facultad->id}} - {{$facultad->Nombre}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>
@endsection
