@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
      @if ($user->roles()->first()->name=='Administrador')
        <li class="breadcrumb-item"><a href="#">Administradores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Administrador {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
      @if ($user->roles()->first()->name=='SecFacultad')
        <li class="breadcrumb-item"><a href="#">Secretarios de Facultad</a></li>
        <li class="breadcrumb-item active" aria-current="page">Secretario de Facultad {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
      @if ($user->roles()->first()->name=='Secretario')
        <li class="breadcrumb-item"><a href="#">Secretarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Secretario {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
  </ol>
</nav>

  <h1>RUT del Usuario: {{ $user->id }} - {{ $user->verificador }}</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
              @if ($user->roles()->first()->name=='Administrador')
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Atras</a>
              @endif
              @if ($user->roles()->first()->name=='SecFacultad')
                <a class="btn btn-primary" href="{{ route('users.index2') }}"> Atras</a>
              @endif
              @if ($user->roles()->first()->name=='Secretario')
                <a class="btn btn-primary" href="{{ route('users.index3') }}"> Atras</a>
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
