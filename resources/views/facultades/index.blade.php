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
    @if (Request::is('departamentos'))
      <li class="breadcrumb-item active" aria-current="page">Facultades</li>
    @else
      <li class="breadcrumb-item active" aria-current="page">Facultades Eliminadas</li>
    @endif
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Facultades UCM</h2>
            </div>
            @if (Request::is('facultades'))
              <div class="pull-left">
                  <a class="btn btn-success" href="{{ route('facultades.indexelim') }}"> Ver Inactivas</a>
              </div>
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('facultades.create') }}"> Crear Nueva Facultad</a>
              </div>
            @else
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('facultades.index') }}"> Ver Activas</a>
            </div>
            @endif
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Decano Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($facultades as $facultad)
        <tr>
            <td>{{ $facultad->id }}</td>
            <td>{{ $facultad->Nombre }}</td>
            <td>{{ $facultad->DecanoNombre }}</td>
            <td>{{ $facultad->DecanoAPaterno }}</td>
            <td>{{ $facultad->DecanoAMaterno }}</td>
            <td>@if (Request::is('facultades'))Activo @else Inactivo @endif</td>
            <td>
              @if (Request::is('facultades'))
                <form action="{{ route('facultades.destroy',$facultad->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('facultades.show',$facultad->id) }}">Mostrar</a>
                    <a class="btn btn-primary" href="{{ route('facultades.edit',$facultad->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Desactivar</button>
                </form>
              @else
                <form action="{{ route('facultades.reactivar',$facultad->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Reactivar</button>
                </form>
              @endif
            </td>

        </tr>
        @endforeach
    </table>

    {!! $facultades->links() !!}

@endsection
