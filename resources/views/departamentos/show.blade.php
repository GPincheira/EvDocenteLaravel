@extends('layouts.app')
<title>{{ $departamento->Nombre }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('departamentos.index') }}">Departamentos</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $departamento->Nombre }}</li>
  </ol>
</nav>

    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h1>{{ $departamento->Nombre }}</h1>
          </div>
          <div class="pull-right">
              <a href="{{ route('departamentos.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
          </div>
      </div>
    </div>


    <div class="content">
      <div class="row">
        <div class="col-md-8">
          <table class="table table-bordered container" style="margin-left: 100px">
            <tbody>
              <tr>
                <th class="blue">Id del Departamento</th>
                <td>{{ $departamento->id }}</td>
              </tr>
              <tr>
                <th class="blue">Nombre del Departamento</th>
                <td>{{ $departamento->Nombre }}</td>
              </tr>
              <tr>
                <th class="blue">Facultad a la que pertenece</th>
                <td>{{ $departamento->CodigoFacultad }} - {{ $departamento->facultad->Nombre }}</td>
              </tr>
              <tr>
                <th class="blue">Estado</th>
                <td>@if ($departamento->deleted_at == NULL) Activo @else Inactivo @endif</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

@endsection
