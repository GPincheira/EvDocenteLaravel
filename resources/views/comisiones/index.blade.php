@extends('layouts.app')

@if (Request::is('comisiones'))
  <title>Comisiones UCM</title>
@else
  <title>Comisiones Eliminadas UCM</title>
@endif

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Comisiones</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Comisiones UCM</h2>
            </div>

  {{--Si el usuario es un secretario de facultad, se le muestra el boton para crear nueva comision --}}
            @if(@Auth::user()->hasRole('SecFacultad'))
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('comisiones.create') }}"> Crear Nueva Comision</a>
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
            <th>Año</th>
            <th>Facultad:</th>
            <th>Decano:</th>
            <th>Secretario de Facultad:</th>
            <th>Integrante 3:</th>
            <th>Integrante 4:</th>
            <th width="280px">Action</th>
        </tr>
        @if(@Auth::user()->hasRole('Administrador'))
          @foreach ($comisiones as $comision)
            <tr>
              <td>{{ $comision->id }}</td>
              <td>{{ $comision->Año }}</td>
              <td>{{ $comision->CodigoFacultad }}</td>
              <td>{{ $comision->NombreDecano }} {{ $comision->APaternoDecano }} {{ $comision->AMaternoDecano }}</td>
              <td>{{ $comision->NombreSecFac }} {{ $comision->APaternoSecFac }} {{ $comision->AMaternoSecFac }}</td>
              <td>{{ $comision->Nombre1 }} {{ $comision->APaterno1 }} {{ $comision->AMaterno1 }}</td>
              <td>{{ $comision->Nombre2 }} {{ $comision->APaterno2 }} {{ $comision->AMaterno2 }}</td>
              <td>
                  <form>
                      <a class="btn btn-info" href="{{ route('comisiones.show',$comision->id) }}">Ver</a>

                      @csrf
                  </form>
              </td>
            </tr>
          @endforeach
        @endif
        @if(@Auth::user()->hasRole('SecFacultad'))
          @foreach ($comisiones as $comision)
            @if(@Auth::user()->id == $comision->idSecFacultad)
              <tr>
                <td>{{ $comision->id }}</td>
                <td>{{ $comision->Año }}</td>
                <td>{{ $comision->CodigoFacultad }}</td>
                <td>{{ $comision->NombreDecano }} {{ $comision->APaternoDecano }} {{ $comision->AMaternoDecano }}</td>
                <td>{{ $comision->NombreSecFac }} {{ $comision->APaternoSecFac }} {{ $comision->AMaternoSecFac }}</td>
                <td>{{ $comision->Nombre1 }} {{ $comision->APaterno1 }} {{ $comision->AMaterno1 }}</td>
                <td>{{ $comision->Nombre2 }} {{ $comision->APaterno2 }} {{ $comision->AMaterno2 }}</td>
                <td>
                    <form>
                        <a class="btn btn-info" href="{{ route('comisiones.show',$comision->id) }}">Ver</a>
                        @csrf
                    </form>
                </td>
              </tr>
            @endif
          @endforeach
        @endif
    </table>

    {!! $comisiones->links() !!}

@endsection
