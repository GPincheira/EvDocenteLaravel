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
            <th>Año</th>
            <th>RUT del Academico</th>
            <th>Nombre Academico</th>
            <th>Departamento</th>
            <th>Nota Final</th>
        </tr>
        @foreach ($evaluaciones as $evaluacion)
          <tr>
            <td>{{ $evaluacion->año }}</td>
            <td>{{ $evaluacion->RUTAcademico }}-{{ $evaluacion->academico->verificador }}</td>
            <td>{{ $evaluacion->academico->Nombres }} {{ $evaluacion->academico->ApellidoPaterno }} {{ $evaluacion->academico->ApellidoMaterno }}</td>
            <td>{{ $evaluacion->academico->departamento->id }} - {{ $evaluacion->academico->departamento->Nombre }}</td>
            <td>{{ $evaluacion->NotaFinal }}</td>
          </tr>
        @endforeach
    </table>

    {!! $evaluaciones->links() !!}

@endsection
