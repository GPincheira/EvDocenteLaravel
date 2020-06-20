@extends('layouts.app')

@if (Request::is('evaluaciones'))
  <title>Evaluaciones UCM</title>
@else
  <title>Evaluaciones Eliminadas UCM</title>
@endif

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Evaluaciones</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Evaluaciones UCM</h2>
            </div>
            @if (Request::is('evaluaciones'))
              <div class="pull-left">
                  <a class="btn btn-secondary" href="{{ route('evaluaciones.indexelim') }}"> Ver Inactivas</a>
              </div>
              @if(@Auth::user()->hasRole('SecFacultad'))
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('evaluaciones.create') }}"> Realizar Nueva Evaluacion</a>
                </div>
              @endif
            @else
            <div class="pull-left">
                <a class="btn btn-info" href="{{ route('evaluaciones.index') }}"> Ver Activas</a>
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
            <th width="280px"></th>
        </tr>
        @if(@Auth::user()->hasRole('SecFacultad'))
          @foreach ($evaluaciones as $evaluacion)
            @foreach ($comisiones as $comision)
              @if ($evaluacion->CodigoComision == $comision->id)
                <tr>
                  <td>{{ $evaluacion->id }}</td>
                  <td>{{ $evaluacion->CodigoComision }}</td>
                  <td>{{ $evaluacion->RUTAcademico }}</td>
                  <td>{{ $evaluacion->NotaFinal }}</td>
                  <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
                  <td>
                    @if (Request::is('evaluaciones'))
                      <form action="{{ route('evaluaciones.destroy',$evaluacion->id) }}" method="POST">
                          <a class="btn btn-info" href=>Mostrar</a>
                          <a class="btn btn-primary" href=>Editar</a>
                          <a href="{{ route('evaluaciones.show',$evaluacion->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                          <a href="{{ route('evaluaciones.edit',$evaluacion->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
                          <a class="btn btn-primary" href="{{ route('evaluaciones.pdf',$evaluacion->id) }}">Generar PDF</a>
                            @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
                      </form>
                    @else
                      <form action="{{ route('evaluaciones.reactivar',$evaluacion->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i></button>
                      </form>
                    @endif
                  </td>
                </tr>
              @endif
            @endforeach
          @endforeach
        @elseif(@Auth::user()->hasRole('Administrador'))
            @foreach ($evaluaciones as $evaluacion)
            <tr>
              <td>{{ $evaluacion->id }}</td>
              <td>{{ $evaluacion->CodigoComision }}</td>
              <td>{{ $evaluacion->RUTAcademico }}</td>
              <td>{{ $evaluacion->NotaFinal }}</td>
              <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
              <td>
                @if (Request::is('evaluaciones'))
                  <form>
                      <a href="{{ route('evaluaciones.show',$evaluacion->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                      <a href="{{ route('evaluaciones.pdf',$evaluacion->id) }}"><img src="{{ asset('/images/pdf.jpg') }}" class="logo" width="40" height="40"></a>
                  </form>
                @endif
              </td>
            </tr>
            @endforeach
          @else
            @foreach ($evaluaciones as $evaluacion)
              @if ($evaluacion->año == date("Y"))
                <tr>
                  <td>{{ $evaluacion->id }}</td>
                  <td>{{ $evaluacion->CodigoComision }}</td>
                  <td>{{ $evaluacion->RUTAcademico }}</td>
                  <td>{{ $evaluacion->NotaFinal }}</td>
                  <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
                  <td>
                    @if (Request::is('evaluaciones'))
                      <form>
                          <a href="{{ route('evaluaciones.show',$evaluacion->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                          <a class="btn btn-primary" href="{{ route('evaluaciones.pdf',$evaluacion->id) }}">Generar PDF</a>
                      </form>
                    @endif
                  </td>
                </tr>
                @endif
            @endforeach
          @endif
    </table>

    {!! $evaluaciones->links() !!}

@endsection
