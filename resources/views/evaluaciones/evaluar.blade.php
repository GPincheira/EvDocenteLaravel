@extends('layouts.app')
<title>Crear Evaluacion UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('evaluaciones.index') }}">Evaluaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Evaluacion</li>
  </ol>
</nav>

@if (Session::has('message'))
<div class="alert alert-danger">{{Session::get('message')}}</div>
 @endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Se ha detectado un problema.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Realizar nueva Evaluacion</h2>
        </div>
        <div class="pull-right">
            <a href="{{ route('evaluaciones.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
        </div>
    </div>
</div>

<div class="row content">
  <div class="col-lg-12 margin-tb">
    <h1>PAUTA RESUMEN</h1>
  </div>
</div>

<div class="row container">
    <h3>I. IDENTIFICACION</h3>
</div>

<div class="col-md-12">
  <table class="table table-bordered content">
    <tbody>
      <tr>
        <td height=40>{{ $academico->Nombres }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
        <td>{{ $academico->departamento->id }} - {{ $academico->departamento->Nombre }}</td>
      </tr>
      <tr class="table-active">
        <td width="50%">Académico</td>
        <td width="50%">Departamento</td>
      </tr>
      <tr high="20px">
        <td height=40>{{ $academico->departamento->facultad->id }} - {{ $academico->departamento->facultad->Nombre }}</td>
        <td>{{ $año }}</td>
      </tr>
      <tr class="table-active" height="4%">
        <td>Facultad o Instituto al que pertenece</td>
        <td>Periodo que se evalua</td>
      </tr>
      <tr>
        <td height=40>{{ $academico->TituloProfesional }}</td>
        <td>{{ $academico->HorasContrato }}</td>
      </tr>
      <tr class="table-active">
        <td>Título Profesional</td>
        <td>Horas de Contrato</td>
      </tr>
      <tr>
        <td height=40>{{ $academico->Categoria }}</td>
        <td>{{ $academico->GradoAcademico }}</td>
      </tr>
      <tr class="table-active">
        <td>Categoría</td>
        <td>Grado Académico</td>
      </tr>
      <tr>
        <td height=40>@if ($ultima) {{ $ultima->NotaFinal }} @endif</td>
        <td>{{ $academico->TipoPlanta }}</td>
      </tr>
      <tr class="table-active">
        <td>Calificación Anterior</td>
        <td>Tipo de Planta</td>
      </tr>
    </tbody>
  </table>

</div>

  <div class="row">
    <div class="col-lg-12 margin-tb">
        <evaluacion-component datito="{{ $academico->id }}" ></evaluacion-component>
      </div>
  </div>


@if (Session::has('message'))
<div class="alert alert-danger">{{Session::get('message')}}</div>
 @endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Se ha detectado un problema.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@endsection
