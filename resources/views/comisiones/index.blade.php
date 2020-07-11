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
    <li class="breadcrumb-item active" aria-current="page">Comisiones @if(@Auth::user()->hasRole('SecFacultad')) {{ @Auth::user()->secFacultad->facultad->Nombre }} @endif</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      @if(@Auth::user()->hasRole('SecFacultad'))
      <h2>Comisiones {{ @Auth::user()->secFacultad->facultad->Nombre }} UCM</h2>
      @else
        <h2>Comisiones UCM</h2>
      @endif
    </div>
    @if(@Auth::user()->hasRole('SecFacultad'))
      <div class="pull-right">
          <a href="{{ route('comisiones.create') }}" class="btn btn-success">Añadir Comision</a>
      </div>
    @endif
  </div>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

@if(@Auth::user()->hasRole('SecFacultad'))
  @if ($activa === null)
    <div class="card text-center blue" style="margin-top: 8px">
      <div class="card-header"><h4><i class="material-icons">warning</i> NO EXISTE UNA COMISION ACTIVA PARA ESTE AÑO</h4></div>
    </div>
  @endif
@endif

<table class="table table-bordered" style="margin-top: 8px">
  <tr>
    <th>Id</th>
    <th>Año</th>
    <th>Facultad</th>
    <th>Decano de Facultad</th>
    <th>Secretario de Facultad</th>
    <th>Integrante 3</th>
    <th>Integrante 4</th>
    <th>Estado</th>
  </tr>
  @if(@Auth::user()->hasRole('Administrador'))
    @foreach ($comisiones as $comision)
      <tr >
        <td>{{ $comision->id }}</td>
        <td>{{ $comision->Año }}</td>
        <td>{{ $comision->CodigoFacultad }} - {{ $comision->facultad->Nombre }}</td>
        <td>{{ $comision->NombreDecano }} {{ $comision->APaternoDecano }} {{ $comision->AMaternoDecano }}</td>
        <td>{{ $comision->NombreSecFac }} {{ $comision->APaternoSecFac }} {{ $comision->AMaternoSecFac }}</td>
        <td>{{ $comision->Nombre1 }} {{ $comision->APaterno1 }} {{ $comision->AMaterno1 }}</td>
        <td>{{ $comision->Nombre2 }} {{ $comision->APaterno2 }} {{ $comision->AMaterno2 }}</td>
        <td>{{ $comision->Estado }}</td>
        <td>
          <form>
            <a href="{{ route('comisiones.show',$comision->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
            @csrf
          </form>
        </td>
      </tr>
    @endforeach
  @else
    @foreach ($comisiones as $comision)
      <tr @if($activa == $comision) style="background-color:#FCFF55" @endif>
        <td>{{ $comision->id }}</td>
        <td>{{ $comision->Año }}</td>
        <td>{{ $comision->CodigoFacultad }} - {{ $comision->facultad->Nombre }}</td>
        <td>{{ $comision->NombreDecano }} {{ $comision->APaternoDecano }} {{ $comision->AMaternoDecano }}</td>
        <td>{{ $comision->NombreSecFac }} {{ $comision->APaternoSecFac }} {{ $comision->AMaternoSecFac }}</td>
        <td>{{ $comision->Nombre1 }} {{ $comision->APaterno1 }} {{ $comision->AMaterno1 }}</td>
        <td>{{ $comision->Nombre2 }} {{ $comision->APaterno2 }} {{ $comision->AMaterno2 }}</td>
        @if ($comision->Año == date("Y") && $comision->id != $activa->id)
          <td><form action="{{ route('comisiones.activaunica',$comision->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Activar</button>
          </form></td>
        @else
          <td class="text-center">{{ $comision->Estado }}</td>
        @endif
        <td>
          <form>
            <a href="{{ route('comisiones.show',$comision->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
            @csrf
          </form>
        </td>
      </tr>
    @endforeach
  @endif
</table>

{!! $comisiones->links() !!}

@endsection
