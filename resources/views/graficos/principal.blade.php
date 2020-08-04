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
  <div class="col-lg-12 margin-tb">
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


@endsection
