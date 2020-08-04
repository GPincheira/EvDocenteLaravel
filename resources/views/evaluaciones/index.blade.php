@extends('layouts.app')

@if(@Auth::user()->hasRole('Administrador'))
    <title>Evaluaciones @if(Request::is('evaluacioneselim')) Eliminadas @endif UCM</title>
@elseif(@Auth::user()->hasRole('SecFacultad'))
    <title>Evaluaciones @if(Request::is('evaluacioneselim')) Eliminadas @endif {{ @Auth::user()->SecFacultad->facultad->Nombre }} UCM</title>
@else
    <title>Evaluaciones año {{ date("Y") }} UCM</title>
@endif

@section('content')

@if(!Request::is('evaluacioneselim'))

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
      @if(@Auth::user()->hasRole('Administrador'))
          <li class="breadcrumb-item active" aria-current="page">Evaluaciones</li>
      @elseif(@Auth::user()->hasRole('SecFacultad'))
          <li class="breadcrumb-item active" aria-current="page">Evaluaciones {{ @Auth::user()->SecFacultad->facultad->Nombre }}</li>
      @else
          <li class="breadcrumb-item active" aria-current="page">Evaluaciones año {{ date("Y") }}</li>
      @endif
    </ol>
  </nav>

  @if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
      <p>{{ $message }}</p>
    </div>
  @endif

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

<div id="accordion">
  @if(@Auth::user()->hasRole('SecFacultad'))
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" style="color:black" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <h3>Evaluaciones Pendientes</h3>
          </button>
        </h5>
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
                <td>{{ $academico->Nombre }}</td>
                <td width="100px">
                    <a href="{{ route('evaluaciones.evaluar',$academico->id) }}" class="btn btn-success">Evaluar</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  @endif
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" style="color:black" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

            <div class="row">
              <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                  @if(@Auth::user()->hasRole('Administrador'))
                      <h3>Evaluaciones UCM</h3>
                  @elseif(@Auth::user()->hasRole('SecFacultad'))
                      <h3>Evaluaciones Realizadas</h3>
                  @else
                      <h3>Evaluaciones año {{ date("Y") }} UCM</h3>
                  @endif
                </div>
                @if(@Auth::user()->hasRole('Administrador') || @Auth::user()->hasRole('SecFacultad'))
                  <div class="pull-left">
                      <a class="btn btn-secondary" style="margin-left: 12px" href="{{ route('evaluaciones.indexelim') }}"> Ver Inactivas</a>
                  </div>
                @endif
              </div>
            </div>

          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          <table class="table table-bordered"  style="margin-top: 8px">
            <tr>
              <th>Id</th>
              <th>Año</th>
              <th>Nombre Academico</th>
              @if(@Auth::user()->hasRole('Administrador') || @Auth::user()->hasRole('Secretario'))
                <th>Facultad</th>
              @endif
              <th>Departamento</th>
              <th>Nota Final</th>
            </tr>
              @foreach ($evaluaciones as $evaluacion)
                <tr>
                  <td>{{ $evaluacion->id }}</td>
                  <td>{{ $evaluacion->año }}</td>
                  <td>{{ $evaluacion->academico->Nombres}} {{ $evaluacion->academico->ApellidoPaterno}} {{ $evaluacion->academico->ApellidoMaterno}}</td>
                  <td>{{ $evaluacion->academico->departamento->id }} - {{ $evaluacion->academico->departamento->Nombre }}</td>
                  @if(@Auth::user()->hasRole('Administrador') || @Auth::user()->hasRole('Secretario'))
                    <td>{{ $evaluacion->academico->departamento->facultad->id }} - {{ $evaluacion->academico->departamento->facultad->Nombre }}</td>
                  @endif
                  <td>{{ $evaluacion->NotaFinal }}</td>
                  @if(@Auth::user()->hasRole('Administrador') || @Auth::user()->hasRole('Secretario'))
                    <td width="160px">
                      <form>
                        <a href="{{ route('evaluaciones.show',$evaluacion->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                        <a href="{{ route('evaluaciones.pdf',$evaluacion->id) }}"><img src="{{ asset('/images/pdf.jpg') }}" class="logo" width="40" height="40"></a>
                        <a href="{{ route('exportaracademico',$evaluacion->id) }}"><img src="{{ asset('/images/excel.png') }}" class="logo" width="40" height="35"></a>
                      </form>
                    </td>
                  @else
                    <td width="255px">
                      <form action="{{ route('evaluaciones.destroy',$evaluacion->id) }}" method="POST">
                        <a href="{{ route('evaluaciones.show',$evaluacion->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                        <a href="{{ route('evaluaciones.edit',$evaluacion->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
                        <a href="{{ route('evaluaciones.pdf',$evaluacion->id) }}"><img src="{{ asset('/images/pdf.jpg') }}" class="logo" width="40" height="40"></a>
                        <a href="{{ route('exportaracademico',$evaluacion->id) }}"><img src="{{ asset('/images/excel.png') }}" class="logo" width="40" height="35"></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
                      </form>
                    </td>
                  @endif
                </tr>
              @endforeach
          </table>
        </div>
      </div>
    </div>
</div>

@else

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
      @if(@Auth::user()->hasRole('Administrador'))
          <li class="breadcrumb-item active" aria-current="page">Evaluaciones Eliminadas</li>
      @else
          <li class="breadcrumb-item active" aria-current="page">Evaluaciones Eliminadas {{ @Auth::user()->SecFacultad->facultad->Nombre }}</li>
      @endif
    </ol>
  </nav>

  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        @if(@Auth::user()->hasRole('Administrador'))
          <h2>Evaluaciones Eliminadas UCM</h2>
        @else
          <h2>Evaluaciones Eliminadas {{ @Auth::user()->SecFacultad->facultad->Nombre }} UCM</h2>
        @endif
      </div>
      <div class="pull-left">
        <a class="btn btn-info" style="margin-left: 12px" href="{{ route('evaluaciones.index') }}"> Ver Activas</a>
      </div>
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
      <th>Año</th>
      <th>Academico</th>
      <th>Nota Final</th>
      <th>Estado</th>
    </tr>
    @foreach ($evaluaciones as $evaluacion)
      <tr>
        <td>{{ $evaluacion->id }}</td>
        <td>{{ $evaluacion->año }}</td>
        <td>{{ $evaluacion->RUTAcademico}}</td>
        <td>{{ $evaluacion->NotaFinal }}</td>
        <td>@if (Request::is('evaluaciones'))Activo @else Inactivo @endif</td>
        @if(@Auth::user()->hasRole('SecFacultad'))
          @if ($evaluacion->academico)
            <td width="60px">
              <form action="{{ route('evaluaciones.reactivar',$evaluacion->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i></button>
              </form>
            </td>
          @endif
        @endif
      </tr>
    @endforeach
  </table>

@endif

{!! $evaluaciones->links() !!}

@endsection
