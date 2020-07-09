@extends('layouts.app')

@if (Request::is('facultades'))
  <title>Facultades UCM</title>
@else
  <title>Facultades Eliminadas UCM</title>
@endif

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    @if (Request::is('facultades'))
      <li class="breadcrumb-item active" aria-current="page">Facultades</li>
    @else
      <li class="breadcrumb-item active" aria-current="page">Facultades Eliminadas</li>
    @endif
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      @if (Request::is('facultades'))
        <h2>Facultades UCM</h2>
      @else
        <h2>Facultades Eliminadas UCM</h2>
      @endif
    </div>
    @if (Request::is('facultades'))
      <div class="pull-left">
        <a class="btn btn-secondary" style="margin-left: 12px" href="{{ route('facultades.indexelim') }}"> Ver Inactivas</a>
      </div>
      <div class="pull-right">
        <a href="{{ route('facultades.create') }}" class="btn btn-success">Añadir Facultad</a>
      </div>
    @else
      <div class="pull-left">
        <a class="btn btn-info" style="margin-left: 12px" href="{{ route('facultades.index') }}"> Ver Activas</a>
      </div>
    @endif
  </div>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

<table class="table table-bordered" style="margin-top: 8px">
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Decano</th>
    <th>Estado</th>
  </tr>
  @foreach ($facultades as $facultad)
    <tr>
      <td>{{ $facultad->id }}</td>
      <td>{{ $facultad->Nombre }}</td>
      <td>{{ $facultad->DecanoNombre }} {{ $facultad->DecanoAPaterno }} {{ $facultad->DecanoAMaterno }}</td>
      <td>@if (Request::is('facultades'))Activo @else Inactivo @endif</td>
      @if (Request::is('facultades'))
        <td width="167px">
          <form action="{{ route('facultades.destroy',$facultad->id) }}" method="POST">
            <a href="{{ route('facultades.show',$facultad->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
            <a href="{{ route('facultades.edit',$facultad->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
          </form>
        </td>
      @else
        <td width="60px">
          <form action="{{ route('facultades.reactivar',$facultad->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i></button>
          </form>
          </td>
      @endif
    </tr>
  @endforeach
</table>

{!! $facultades->links() !!}

@endsection
