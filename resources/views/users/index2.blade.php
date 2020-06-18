@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Secretarios de Facultad</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuarios Secretarios de Facultad</h2>
            </div>
            @if (Request::is('users2'))
              <div class="pull-left">
                  <a class="btn btn-success" href="{{ route('users.index2elim') }}"> Ver Inactivos</a>
              </div>
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('users.create2') }}"> Crear Nuevo Secretario de Facultad</a>
              </div>
            @else
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('users.index2') }}"> Ver Activos</a>
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
            <th>RUT</th>
            <th>Nombre</th>
            <th>ApellidoPaterno</th>
            <th>ApellidoMaterno</th>
            <th>email</th>
            <th>Rol</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
          @if ($user->roles()->first()->name=='SecFacultad')
          <tr>
              <td>{{ $user->id }}-{{ $user->verificador }}</td>
              <td>{{ $user->Nombre }}</td>
              <td>{{ $user->ApellidoPaterno }}</td>
              <td>{{ $user->ApellidoMaterno }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->roles()->first()->name}}</td>
              <td>@if (Request::is('users2'))Activo @else Inactivo @endif</td>
              <td>
                @if (Request::is('users2'))
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Desactivar</button>
                    </form>
                @else
                  <form action="{{ route('users.reactivar',$user->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger">Reactivar</button>
                  </form>
                @endif
              </td>
          </tr>
          @endif
        @endforeach
    </table>

    {!! $users->links() !!}

@endsection
