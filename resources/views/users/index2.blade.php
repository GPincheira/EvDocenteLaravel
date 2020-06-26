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
                <h2>Usuarios Secretarios de Facultad @if(Request::is('users2elim')) Eliminados @endif UCM</h2>
            </div>
            @if (Request::is('users2'))
              <div class="pull-left">
                  <a class="btn btn-secondary" style="margin-left: 12px" href="{{ route('users.index2elim') }}"> Ver Inactivos</a>
              </div>
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('users.create2') }}"> Crear Nuevo Secretario de Facultad</a>
              </div>
            @else
            <div class="pull-left">
                <a class="btn btn-info" style="margin-left: 12px" href="{{ route('users.index2') }}"> Ver Activos</a>
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
            <th width="120px">RUT</th>
            <th>Nombre Completo</th>
            <th>E-mail</th>
            @if (Request::is('users2'))
              <th>Facultad</th>
            @endif
            <th>Estado</th>
        </tr>
        @foreach ($users as $user)
          @if ($user->roles()->first()->name=='SecFacultad')
          <tr>
              <td>{{ $user->id }}-{{ $user->verificador }}</td>
              <td>{{ $user->Nombre }} {{ $user->ApellidoPaterno }} {{ $user->ApellidoMaterno }}</td>
              <td>{{ $user->email }}</td>
              @if (Request::is('users2'))
                <td>{{ $user->secFacultad->CodigoFacultad }} - {{ $user->secFacultad->facultad->Nombre }}</td>
              @endif
              <td>@if (Request::is('users2'))Activo @else Inactivo @endif</td>
              @if (Request::is('users2'))
                <td width="167px">
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a href="{{ route('users.show',$user->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
                    </form>
                </td>
              @else
                <td width="60px">
                  <form action="{{ route('users.reactivar',$user->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i></button>
                  </form>
                </td>
              @endif
          </tr>
          @endif
        @endforeach
    </table>

    {!! $users->links() !!}

@endsection
