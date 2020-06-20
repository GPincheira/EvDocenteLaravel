@extends('layouts.app')

@if ($user->roles()->first()->name=='Administrador')
  <title>Administrador {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</title>
@endif
@if ($user->roles()->first()->name=='SecFacultad')
  <title>Sec Facultad {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</title>
@endif
@if ($user->roles()->first()->name=='Secretario')
  <title>Secretario {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</title>
@endif

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
      @if ($user->roles()->first()->name=='Administrador')
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Administradores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Administrador: {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
      @if ($user->roles()->first()->name=='SecFacultad')
        <li class="breadcrumb-item"><a href="{{ route('users.index2') }}">Secretarios de Facultad</a></li>
        <li class="breadcrumb-item active" aria-current="page">Secretario de Facultad: {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
      @if ($user->roles()->first()->name=='Secretario')
        <li class="breadcrumb-item"><a href="{{ route('users.index3') }}">Secretarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Secretario: {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
  </ol>
</nav>

  <h1>RUT del Usuario: {{ $user->id }} - {{ $user->verificador }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
              @if ($user->roles()->first()->name=='Administrador')
                <a href="{{ route('users.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
              @endif
              @if ($user->roles()->first()->name=='SecFacultad')
                <a href="{{ route('users.index2') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
              @endif
              @if ($user->roles()->first()->name=='Secretario')
                <a href="{{ route('users.index3') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
              @endif
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del Usuario:</strong>
                {{ $user->Nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido Paterno:</strong>
                {{ $user->ApellidoPaterno }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido Materno:</strong>
                {{ $user->ApellidoMaterno }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                @if ($user->deleted_at == NULL) Activo @else Inactivo @endif
            </div>
        </div>
    </div>
@endsection
