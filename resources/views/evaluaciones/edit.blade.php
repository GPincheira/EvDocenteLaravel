@extends('layouts.app')
<title>Editar Evaluacion {{ $evaluacion->id }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('evaluaciones.index') }}">Evaluaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Evaluacion {{ $evaluacion->id }}</li>
  </ol>
</nav>

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

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Evaluacion</h2>
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

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered content">
				<tbody>
					<tr>
						<td height=40>{{ $evaluacion->academico->Nombres }} {{ $evaluacion->academico->ApellidoPaterno }} {{ $evaluacion->academico->ApellidoMaterno }}</td>
						<td>{{ $evaluacion->academico->departamento->id }} - {{ $evaluacion->academico->departamento->Nombre }}</td>
					</tr>
          <tr class="table-active">
						<td width="50%">Académico</td>
						<td width="50%">Departamento</td>
					</tr>
          <tr high="20px">
						<td height=40>{{ $evaluacion->academico->departamento->facultad->id }} - {{ $evaluacion->academico->departamento->facultad->Nombre }}</td>
						<td>{{ $evaluacion->año }}</td>
					</tr>
          <tr class="table-active" height="4%">
						<td>Facultad o Instituto al que pertenece</td>
						<td>Periodo que se evalua</td>
					</tr>
          <tr>
						<td height=40>{{ $evaluacion->academico->TituloProfesional }}</td>
						<td>{{ $evaluacion->academico->HorasContrato }}</td>
					</tr>
          <tr class="table-active">
						<td>Título Profesional</td>
						<td>Horas de Contrato</td>
					</tr>
          <tr>
						<td height=40>{{ $evaluacion->academico->Categoria }}</td>
						<td>{{ $evaluacion->academico->GradoAcademico }}</td>
					</tr>
          <tr class="table-active">
						<td>Categoría</td>
						<td>Grado Académico</td>
					</tr>
          <tr>
						<td height=40>@if ($ultima) {{ $ultima->NotaFinal }} @endif</td>
						<td>{{ $evaluacion->academico->TipoPlanta }}</td>
					</tr>
          <tr class="table-active">
						<td>Calificación Anterior</td>
						<td>Tipo de Planta</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="row">
  <div class="col-lg-12 margin-tb">
      <editarev-component datito="{{ $evaluacion->id }}" ></editarev-component>
    </div>
</div>

@endsection
