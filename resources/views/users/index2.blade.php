@extends('layouts.app')
@if (Request::is('users2'))
  <title>Sec Facultad UCM</title>
@else
  <title>Sec Facultad Eliminados UCM</title>
@endif
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    @if (Request::is('users2'))
      <li class="breadcrumb-item active" aria-current="page">Secretarios de Facultad</li>
    @else
      <li class="breadcrumb-item active" aria-current="page">Secretarios de Facultad Eliminados</li>
    @endif
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuarios Secretarios de Facultad</h2>
            </div>
            @if (Request::is('users2'))
              <div class="pull-left">
                  <a class="btn btn-secondary" href="{{ route('users.index2elim') }}"> Ver Inactivos</a>
              </div>
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('users.create2') }}"> Crear Nuevo Secretario de Facultad</a>
              </div>
            @else
            <div class="pull-left">
                <a class="btn btn-info" href="{{ route('users.index2') }}"> Ver Activos</a>
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
            <th width="120px">RUT</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>E-mail</th>
            <th>Facultad</th>
            <th>Estado</th>
            <th width="280px"></th>
        </tr>
        @foreach ($users as $user)
          @if ($user->roles()->first()->name=='SecFacultad')
          <tr>
              <td>{{ $user->id }}-{{ $user->verificador }}</td>
              <td>{{ $user->Nombre }}</td>
              <td>{{ $user->ApellidoPaterno }}</td>
              <td>{{ $user->ApellidoMaterno }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->secFacultad->CodigoFacultad }} - {{ $user->secFacultad->facultad->Nombre }}</td>
              <td>@if (Request::is('users2'))Activo @else Inactivo @endif</td>
              <td>
                @if (Request::is('users2'))
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a href="{{ route('users.show',$user->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
                    </form>
                @else
                  <form action="{{ route('users.reactivar',$user->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i></button>
                  </form>
                @endif
              </td>
          </tr>
          @endif
        @endforeach
    </table>

    {!! $users->links() !!}

@endsection
