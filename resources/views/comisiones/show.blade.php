@extends('layouts.app')
<title>Comision {{ $comision->id }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('comisiones.index') }}">Comisiones @if(@Auth::user()->hasRole('SecFacultad')) {{ @Auth::user()->secFacultad->facultad->Nombre }} @endif</a></li>
    <li class="breadcrumb-item active" aria-current="page">Comision {{ $comision->id }}</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h1>Codigo de la Comision: {{ $comision->id }}</h1>
          </div>
            <div class="pull-right">
                <a href="{{ route('comisiones.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
            </div>
        </div>
    </div>

    <div class="content">
    	<div class="row">
      	<div class="col-md-8">
          <table class="table table-bordered container" style="margin-left: 100px">
            <tbody>
              <tr>
                <th class="blue">Facultad</th>
                <td>{{ $comision->CodigoFacultad }} - {{ $comision->facultad->Nombre }}</td>
              </tr>
              <tr>
                <th class="blue">Año que ejerce</th>
                <td>{{ $comision->Año }}</td>
              </tr>
              <tr>
                <th class="blue">Fecha de revision</th>
                <td>{{ $comision->Fecha }}</td>
              </tr>
              <tr>
                <th class="blue">Decano de Facultad</th>
                <td>{{ $comision->NombreDecano }} {{ $comision->APaternoDecano }} {{ $comision->AMaternoDecano }}</td>
              </tr>
              <tr>
                <th class="blue">Secretario de Facultad:</th>
                <td>{{ $comision->NombreSecFac }} {{ $comision->APaternoSecFac }} {{ $comision->AMaternoSecFac }}</td>
              </tr>
              <tr>
                <th class="blue">Integrante 3:</th>
                <td>{{ $comision->Nombre1 }} {{ $comision->APaterno1 }} {{ $comision->AMaterno1 }}</td>
              </tr>
              <tr>
                <th class="blue">Integrante 4:</th>
                <td>{{ $comision->Nombre2 }} {{ $comision->APaterno2 }} {{ $comision->AMaterno2 }}</td>
              </tr>
            </tbody>
    			</table>
        </div>
    	</div>
    </div>

@endsection
