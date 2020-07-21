@extends('layouts.app')
<title>Reportes UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Reportes UCM</li>
  </ol>
</nav>

<table class="table table-bordered" style="margin-top: 8px">
  <tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  @foreach ( as )
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  @endforeach
</table>

@endsection
