@extends('layouts.app')
<title>Crear Evaluacion UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('evaluaciones.index') }}">Evaluaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Evaluacion</li>
  </ol>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Realizar nueva Evaluacion</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('evaluaciones.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
        </div>
    </div>
</div>

@if ($proceso->fin >= date('Y-m-d'))
  <div class="row">
    <div class="col-lg-12 margin-tb">
        {{ $academico->Nombre }}
        <evaluacion-component datito="{{ $academico->Nombre }}" ></evaluacion-component>
      </div>
  </div>
  @else
      <h2>No hay procesos de evaluacion abiertos actualmente!</h2>
  @endif

@if (Session::has('message'))
<div class="alert alert-danger">{{Session::get('message')}}</div>
 @endif

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



@endsection
