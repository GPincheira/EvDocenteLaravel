@extends('layouts.app')
@if (Request::is('users1'))
  <title>Administradores UCM</title>
@else
  <title>Arministradores Eliminados UCM</title>
@endif
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    @if (Request::is('users1'))
      <li class="breadcrumb-item active" aria-current="page">Administradores</li>
    @else
      <li class="breadcrumb-item active" aria-current="page">Administradores Eliminados</li>
    @endif
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuarios Administradores UCM</h2>
            </div>
            @if (Request::is('users1'))
              <div class="pull-left">
                  <a class="btn btn-secondary" href="{{ route('users.indexelim') }}"> Ver Inactivos</a>
              </div>
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('users.create') }}"> Crear Nuevo Administrador</a>
              </div>
            @else
            <div class="pull-left">
                <a class="btn btn-info" href="{{ route('users.index') }}"> Ver Activos</a>
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
            <th>Estado</th>
            <th width="280px"></th>
        </tr>
        @foreach ($users as $user)
          @if ($user->roles()->first()->name=='Administrador')
          <tr>
              <td>{{ $user->id }}-{{ $user->verificador }}</td>
              <td>{{ $user->Nombre }}</td>
              <td>{{ $user->ApellidoPaterno }}</td>
              <td>{{ $user->ApellidoMaterno }}</td>
              <td>{{ $user->email }}</td>
              <td>@if (Request::is('users1'))Activo @else Inactivo @endif</td>
              <td>
                @if (Request::is('users1'))
                  @if (@Auth::user()->id != $user->id)
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a href="{{ route('users.show',$user->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
                    </form>
                  @else
                  <a href="{{ route('users.show',$user->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                  <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
                  @endif
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
