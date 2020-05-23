@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Academicos con Excelencia</h2>
            </div>
            @if (Request::is('evaluaciones'))
              <div class="pull-left">
                  <a class="btn btn-success" href="{{ route('evaluaciones.indexelim') }}"> Ver Inactivas</a>
              </div>
            @else
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('evaluaciones.index') }}"> Ver Activas</a>
            </div>
            @endif
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
            <th>Codigo Comision</th>
            <th>RUT del Academico</th>
            <th>Nota Final</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($evaluaciones as $evaluacion)
          @if ($evaluacion->NotaFinal >= 4.5)
            <td>{{ $evaluacion->id }}</td>
            <td>{{ $evaluacion->CodigoComision }}</td>
            <td>{{ $evaluacion->RUTAcademico }}</td>
            <td>{{ $evaluacion->NotaFinal }}</td>
            <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
          @endif
        @endforeach
    </table>

    {!! $evaluaciones->links() !!}

@endsection