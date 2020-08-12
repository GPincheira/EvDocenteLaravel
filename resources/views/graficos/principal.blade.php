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
                 <option value='{{$departamento->id}}' @if(($dpto ?? '') && ($departamento==$dpto)) selected @endif>{{$departamento->Nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xs-1 col-sm-1 col-md-1">
              <br><button type="submit" class="btn btn-primary">Filtrar</button>
          </div>
        </form>
      </div>
  </div>

@if ($dpto ?? '')
  {{ $dpto->Nombre }} {{ $año }}
@else
  {{ $facultad->Nombre }} {{ $año }}
@endif

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <button class="btn btn-link" style="color:black" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <h5>Académicos @if ($dpto ?? '') {{ $dpto->Nombre }} @else {{ $facultad->Nombre }} @endif</h5>
      </button>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <table class="table table-bordered table-sm" style="margin-top: 8px">
          <tr>
            <th>RUT</th>
            <th>Académico</th>
            <th>Título Profesional</th>
            <th>Departamento</th>
          </tr>
          @foreach ($academicos as $academico)
            <tr>
              <td>{{ $academico->id }} - {{ $academico->verificador }}</td>
              <td>{{ $academico->Nombres }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
              <td>{{ $academico->TituloProfesional }}</td>
              <td>{{ $academico->departamento->Nombre }}</td>
              <td width="100px">
                  <a href="{{ route('graficos.academico', $academico->id) }}" class="btn btn-success">Seleccionar</a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
