@extends('layouts.app')

<title>Graficos UCM</title>

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gráficos</li>
  </ol>
</nav>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="pull-left">
      <h2>Gráficos</h2>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

<div class="form-row">
  <div class="col-xs-12 col-sm-12 col-md-12">
      <form action="{{ route('graficos.principal') }}" method="GET">
          <div class="col-xs-4 col-sm-4 col-md-4">
            <h5>Año</h5>
            <select name="año" class="form-control">
              @foreach($procesos as $proceso)
                 <option value='{{$proceso->año}}' @if($proceso->año==$año) selected @endif>{{$proceso->año}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xs-7 col-sm-7 col-md-7">
            <h5>Departamento</h5>
            <select name="departamento" class="form-control">
              <option value="">TODOS LOS DEPARTAMENTOS</option>
              @foreach($departamentos as $departamento)
                 <option value='{{$departamento->id}}' @if($departamento->id==$dpto) selected @endif>{{$departamento->Nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xs-1 col-sm-1 col-md-1">
              <br><button type="submit" class="btn btn-primary">Graficar</button>
          </div>
        </form>
      </div>
  </div>
</div>

@endsection
