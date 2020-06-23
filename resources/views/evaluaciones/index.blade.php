@extends('layouts.app')

@if(@Auth::user()->hasRole('Administrador'))
    <title>Evaluaciones @if(Request::is('evaluacioneselim')) Eliminadas @endif UCM</title>
@elseif(@Auth::user()->hasRole('SecFacultad'))
    <title>Evaluaciones @if(Request::is('evaluacioneselim')) Eliminadas @endif {{ @Auth::user()->SecFacultad->facultad->Nombre }} UCM</title>
@else
    <title>Evaluaciones año {{ date("Y") }} UCM</title>
@endif

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    @if(@Auth::user()->hasRole('Administrador'))
        <li class="breadcrumb-item active" aria-current="page">Evaluaciones @if(Request::is('evaluacioneselim')) Eliminadas @endif</li>
    @elseif(@Auth::user()->hasRole('SecFacultad'))
        <li class="breadcrumb-item active" aria-current="page">Evaluaciones @if(Request::is('evaluacioneselim')) Eliminadas @endif {{ @Auth::user()->SecFacultad->facultad->Nombre }}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">Evaluaciones año {{ date("Y") }}</li>
    @endif
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
              @if(@Auth::user()->hasRole('Administrador'))
                  <h2>Evaluaciones @if(Request::is('evaluacioneselim')) Eliminadas @endif UCM</h2>
              @elseif(@Auth::user()->hasRole('SecFacultad'))
                  <h2>Evaluaciones @if(Request::is('evaluacioneselim')) Eliminadas @endif {{ @Auth::user()->SecFacultad->facultad->Nombre }} UCM</h2>
              @else
                  <h2>Evaluaciones año {{ date("Y") }} UCM</h2>
              @endif
            </div>
            @if (Request::is('evaluaciones'))
              @if(@Auth::user()->hasRole('Administrador') || @Auth::user()->hasRole('SecFacultad'))
                <div class="pull-left">
                    <a class="btn btn-secondary" style="margin-left: 12px" href="{{ route('evaluaciones.indexelim') }}"> Ver Inactivas</a>
                </div>
              @endif
              @if(@Auth::user()->hasRole('SecFacultad'))
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('evaluaciones.create') }}"> Realizar Nueva Evaluacion</a>
                </div>
              @endif
            @else
            <div class="pull-left">
                <a class="btn btn-info" style="margin-left: 12px" href="{{ route('evaluaciones.index') }}"> Ver Activas</a>
            </div>
            @endif
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered"  style="margin-top: 8px">
        <tr>
            <th>Id</th>
            <th>Codigo Comision</th>
            <th>Nombre Academico</th>
            @if(@Auth::user()->hasRole('SecFacultad') || @Auth::user()->hasRole('SecFacultad'))
              <th>Facultad</th>
            @endif
            <th>Departamento</th>
            <th>Nota Final</th>
            <th>Estado</th>
        </tr>
        @if(@Auth::user()->hasRole('SecFacultad'))
          @foreach ($evaluaciones as $evaluacion)
            @foreach ($comisiones as $comision)
              @if ($evaluacion->CodigoComision == $comision->id)
                <tr>
                  <td>{{ $evaluacion->id }}</td>
                  <td>{{ $evaluacion->CodigoComision }}</td>
                  <td>{{ $evaluacion->academico->Nombre}} {{ $evaluacion->academico->ApellidoPaterno}} {{ $evaluacion->academico->ApellidoMaterno}}</td>
                  <td>{{ $evaluacion->academico->departamento->id }} - {{ $evaluacion->academico->departamento->Nombre }}</td>
                  <td>{{ $evaluacion->NotaFinal }}</td>
                  <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
                  @if (Request::is('evaluaciones'))
                    <td width="220px">
                      <form action="{{ route('evaluaciones.destroy',$evaluacion->id) }}" method="POST">
                          <a href="{{ route('evaluaciones.show',$evaluacion->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                          <a href="{{ route('evaluaciones.edit',$evaluacion->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
                          <a href="{{ route('evaluaciones.pdf',$evaluacion->id) }}"><img src="{{ asset('/images/pdf.jpg') }}" class="logo" width="40" height="40"></a>
                            @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
                      </form>
                    </td>
                  @else
                    <td width="60px">
                      <form action="{{ route('evaluaciones.reactivar',$evaluacion->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i></button>
                      </form>
                    </td>
                  @endif

                </tr>
              @endif
            @endforeach
          @endforeach
        @elseif(@Auth::user()->hasRole('Administrador'))
            @foreach ($evaluaciones as $evaluacion)
            <td width="115px">
              <td>{{ $evaluacion->id }}</td>
              <td>{{ $evaluacion->academico->Nombre}} {{ $evaluacion->academico->ApellidoPaterno}} {{ $evaluacion->academico->ApellidoMaterno}}</td>
              <td>{{ $evaluacion->academico->departamento->facultad->id }} - {{ $evaluacion->academico->departamento->facultad->Nombre }}</td>
              <td>{{ $evaluacion->academico->departamento->id }} - {{ $evaluacion->academico->departamento->Nombre }}</td>
              <td>{{ $evaluacion->NotaFinal }}</td>
              <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
              @if (Request::is('evaluaciones'))
                <td>
                  <form>
                      <a href="{{ route('evaluaciones.show',$evaluacion->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                      <a href="{{ route('evaluaciones.pdf',$evaluacion->id) }}"><img src="{{ asset('/images/pdf.jpg') }}" class="logo" width="40" height="40"></a>
                  </form>
                </td>
              @endif
            </tr>
            @endforeach
        @else
            @foreach ($evaluaciones as $evaluacion)
              @if ($evaluacion->año == date("Y"))
                <tr>
                  <td>{{ $evaluacion->id }}</td>
                  <td>{{ $evaluacion->CodigoComision }}</td>
                  <td>{{ $evaluacion->academico->Nombre}} {{ $evaluacion->academico->ApellidoPaterno}} {{ $evaluacion->academico->ApellidoMaterno}}</td>
                  <td>{{ $evaluacion->academico->departamento->facultad->id }} - {{ $evaluacion->academico->departamento->facultad->Nombre }}</td>
                  <td>{{ $evaluacion->academico->departamento->id }} - {{ $evaluacion->academico->departamento->Nombre }}</td>
                  <td>{{ $evaluacion->NotaFinal }}</td>
                  <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
                  @if (Request::is('evaluaciones'))
                    <td <td width="115px">>
                      <form>
                          <a href="{{ route('evaluaciones.show',$evaluacion->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                          <a href="{{ route('evaluaciones.pdf',$evaluacion->id) }}"><img src="{{ asset('/images/pdf.jpg') }}" class="logo" width="40" height="40"></a>
                      </form>
                    </td>
                  @endif
                </tr>
                @endif
            @endforeach
          @endif
    </table>

    {!! $evaluaciones->links() !!}

@endsection
