@extends('layouts.app')
<title>Evaluaciones Excelencia UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Evaluaciones con Excelencia</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Academicos con Excelencia</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Id Comision</th>
            <th>RUT del Academico</th>
            <th>Nombre Academico</th>
            <th>Departamento</th>
            <th>Nota Final</th>
        </tr>
        @foreach ($evaluaciones as $evaluacion)
          @if ($evaluacion->NotaFinal >= 4.5)
          <tr>
            <td>{{ $evaluacion->id }}</td>
            <td>{{ $evaluacion->CodigoComision }}</td>
            <td>{{ $evaluacion->RUTAcademico }}-{{ $evaluacion->academico->verificador }}</td>
            <td>{{ $evaluacion->academico->Nombre }} {{ $evaluacion->academico->ApellidoPaterno }} {{ $evaluacion->academico->ApellidoMaterno }}</td>
            <td>{{ $evaluacion->academico->departamento->id }} - {{ $evaluacion->academico->departamento->Nombre }}</td>
            <td>{{ $evaluacion->NotaFinal }}</td>
            <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
          </tr>
          @endif
        @endforeach
    </table>

    {!! $evaluaciones->links() !!}

@endsection
