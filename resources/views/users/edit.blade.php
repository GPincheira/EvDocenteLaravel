@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
      @if ($user->roles()->first()->name=='Administrador')
        <li class="breadcrumb-item"><a href="#">Administradores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Administrador {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
      @if ($user->roles()->first()->name=='SecFacultad')
        <li class="breadcrumb-item"><a href="#">Secretarios de Facultad</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Secretario de Facultad {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
      @if ($user->roles()->first()->name=='Secretario')
        <li class="breadcrumb-item"><a href="#">Secretarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar Secretario {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno[0] }}.</li>
      @endif
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Usuario</h2>
            </div>
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nombre:</strong>
                      <input type="text" name="Nombre" value="{{ $user->Nombre }}" class="form-control" placeholder="Ingrese Nombre">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Apellido Paterno:</strong>
                      <input type="text" name="ApellidoPaterno" value="{{ $user->ApellidoPaterno }}" class="form-control" placeholder="Ingrese Apellido Paterno">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Apellido Materno:</strong>
                      <input type="text" name="ApellidoMaterno" value="{{ $user->ApellidoMaterno }}" class="form-control" placeholder="Ingrese Apellido Materno">
                  </div>
              </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </form>
@endsection
