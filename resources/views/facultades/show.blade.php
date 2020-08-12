@extends('layouts.app')
<title>{{ $facultad->Nombre }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('facultades.index') }}">Facultades</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $facultad->Nombre }}</li>
  </ol>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h1>{{ $facultad->Nombre }}</h1>
      </div>
        <div class="pull-right">
            <a href="{{ route('facultades.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
        </div>
    </div>
</div>

<div class="content">
  <div class="row">
    <div class="col-md-8">
      <table class="table table-bordered container" style="margin-left: 100px">
        <tbody>
          <tr>
            <th class="blue">Id de la Facultad</th>
            <td>{{ $facultad->id }}</td>
          </tr>
          <tr>
            <th class="blue">Nombre de la Facultad</th>
            <td>{{ $facultad->Nombre }}</td>
          </tr>
          <tr>
            <th class="blue">Nombre del Decano</th>
            <td>{{ $facultad->DecanoNombre }} {{ $facultad->DecanoAPaterno }} {{ $facultad->DecanoAMaterno }}</td>
          </tr>
          <tr>
            <th class="blue">Estado</th>
            <td>@if ($facultad->deleted_at == NULL) Activo @else Inactivo @endif</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
