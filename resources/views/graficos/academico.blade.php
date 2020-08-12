@extends('layouts.app')

<title>Graficos UCM</title>

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('graficos.principal') }}">Graficos Facultad/Dpto</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gráficos {{ $elegido->Nombres }} {{ $elegido->ApellidoPaterno }} {{ $elegido->ApellidoMaterno }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="pull-left">
      <h2>Gráficos {{ $elegido->Nombres }} {{ $elegido->ApellidoPaterno }} {{ $elegido->ApellidoMaterno }} {{ $año }}</h2>
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
      <form action="{{ route('graficos.academico',$elegido->id) }}" method="GET">
        <div class="col-xs-3 col-sm-3 col-md-3">
          <h5>Año a graficar :</h5>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <select name="año" class="form-control">
            <option value="">TODOS LOS AÑOS</option>
            @foreach($procesos as $proceso)
               <option value='{{$proceso->año}}' @if($proceso->año==$año) selected @endif>{{$proceso->año}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
          <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>
  </div>
</div>

@endsection
