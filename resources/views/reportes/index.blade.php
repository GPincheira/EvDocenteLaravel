@extends('layouts.app')
<title>Reportes UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Reportes UCM</li>
  </ol>
</nav>

<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>Generar Reportes por Año</h2>
    </div>
  </div>
</div>

<table class="table table-hover" style="margin-top: 8px">
  <tr>
    <th>Año</th>
    <th>Excel</th>
    <th>PDF</th>
  </tr>
  @for ($año = $añoin; $año <= date("Y"); $año++)
    <tr>
      <td>{{ $año }}</td>
      <td><a href="{{ route('exportarreporte',$año) }}"><img src="{{ asset('/images/excel.png') }}" class="logo" width="40" height="35"></a></td>
      <td><a href="{{ route('home') }}"><img src="{{ asset('/images/pdf.jpg') }}" class="logo" width="40" height="40"></a></td>
    </tr>
  @endfor
</table>

@endsection
