@extends('layouts.app')

@if (Request::is('departamentos'))
  <title>Departamentos UCM</title>
@else
  <title>Departamentos Eliminados UCM</title>
@endif

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    @if (Request::is('departamentos'))
      <li class="breadcrumb-item active" aria-current="page">Departamentos</li>
    @else
      <li class="breadcrumb-item active" aria-current="page">Departamentos Eliminados</li>
    @endif
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 margin-tb">
    @if (Request::is('departamentos'))
      <div class="pull-left">
        <h2>Departamentos UCM</h2>
      </div>
      <div class="pull-left">
        <a class="btn btn-secondary" style="margin-left: 12px" href="{{ route('departamentos.indexelim') }}"> Ver Inactivos</a>
      </div>
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('departamentos.create') }}"> Añadir Departamento</a>
      </div>
    @else
      <div class="pull-left">
        <h2>Departamentos Eliminados UCM</h2>
      </div>
      <div class="pull-left">
        <a class="btn btn-info" style="margin-left: 12px" href="{{ route('departamentos.index') }}"> Ver Activos</a>
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
    <th>Facultad</th>
    <th>Estado</th>
  </tr>
  @foreach ($departamentos as $departamento)
    <tr>
      <td>{{ $departamento->id }}</td>
      <td>{{ $departamento->Nombre }}</td>
      <td>{{ $departamento->CodigoFacultad }} @if (Request::is('departamentos')) - {{ $departamento->facultad->Nombre }} @endif</td>
      <td>@if (Request::is('departamentos'))Activo @else Inactivo @endif</td>
      @if (Request::is('departamentos'))
        <td width="167px">
          <form action="{{ route('departamentos.destroy',$departamento->id) }}" method="POST">
            <a href="{{ route('departamentos.show',$departamento->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
            <a href="{{ route('departamentos.edit',$departamento->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
          </form>
        </td>
      @else
        <td width="60px">
          @foreach ($facultades as $facultad)
            @if ($departamento->CodigoFacultad == $facultad->id && $facultad->deleted_at==NULL)
              <form action="{{ route('departamentos.reactivar',$departamento->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i></button>
              </form>
            @endif
          @endforeach
        </td>
      @endif
    </tr>
  @endforeach
</table>

{!! $departamentos->links() !!}

@endsection
