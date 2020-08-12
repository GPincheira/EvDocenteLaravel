@extends('layouts.app')

@if ($user->roles()->first()->name=='Administrador')
  <title>Administrador {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</title>
@elseif ($user->roles()->first()->name=='SecFacultad')
  <title>Sec Facultad {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</title>
@else
  <title>Secretaria {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</title>
@endif

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
      @if ($user->roles()->first()->name=='Administrador')
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Administradores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Administrador: {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</li>
      @elseif ($user->roles()->first()->name=='SecFacultad')
        <li class="breadcrumb-item"><a href="{{ route('users.index2') }}">Secretarios de Facultad</a></li>
        <li class="breadcrumb-item active" aria-current="page">Secretario de Facultad: {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</li>
      @else
        <li class="breadcrumb-item"><a href="{{ route('users.index3') }}">Secretarias</a></li>
        <li class="breadcrumb-item active" aria-current="page">Secretaria: {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</li>
      @endif
  </ol>
</nav>


<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h1>Usuario @if($user->roles()->first()->name=='Administrador') Administrador
                      @elseif($user->roles()->first()->name=='SecFacultad') Secretario de Facultad
                      @else Secretaria
                      @endif
            : {{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</h1>
      </div>
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

<div class="content">
  <div class="row">
    <div class="col-md-8">
      <table class="table table-bordered container" style="margin-left: 100px">
        <tbody>
          <tr>
            <th class="blue">Rol</th>
            <td>@if($user->roles()->first()->name=='Administrador') Administrador
                @elseif($user->roles()->first()->name=='SecFacultad') Secretario de Facultad
                @else Secretaria
                @endif
            </td>
          </tr>
          @if($user->roles()->first()->name=='SecFacultad')
            <tr>
              <th class="blue">Facultad</th>
              <td>{{ $user->SecFacultad->facultad->Nombre }}</td>
            </tr>
          @endif
          <tr>
            <th class="blue">RUT</th>
            <td>{{ $user->id }}-{{ $user->verificador }}</td>
          </tr>
          <tr>
            <th class="blue">Nombre Completo</th>
            <td>{{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</td>
          </tr>
          <tr>
            <th class="blue">E-mail</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <th class="blue">Estado</th>
            <td>@if ($user->deleted_at == NULL) Activo @else Inactivo @endif</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
