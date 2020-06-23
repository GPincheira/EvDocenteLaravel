@extends('layouts.app')
<title>Academico {{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno[0] }}.</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('academicos.index') }}">Academicos @if(@Auth::user()->hasRole('SecFacultad')) {{ @Auth::user()->secFacultad->facultad->Nombre }} @endif</a></li>
    <li class="breadcrumb-item active" aria-current="page">Academico: {{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno[0] }}.</li>
  </ol>
</nav>

{{--Se muestran los datos de un usuario en academico --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Académico : {{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno[0] }}</h1>
        </div>
        <div class="pull-right">
            <a href="{{ route('academicos.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
        </div>
    </div>
</div>

<div class="content">
	<div class="row">
  	<div class="col-md-8">
      <table class="table table-bordered container" style="margin-left: 100px">
        <tbody>
          <tr >
            <th class="blue">Nombre Completo</th>
            <td>{{ $academico->id }}-{{ $academico->verificador }}</td>
          </tr>
          <tr >
            <th class="blue">Nombre Completo</th>
            <td>{{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
          </tr>
          <tr>
            <th class="blue">Titulo Profesional</th>
            <td>{{ $academico->TituloProfesional }}</td>
          </tr>
          <tr>
            <th class="blue">Grado Academico</th>
            <td>{{ $academico->GradoAcademico }}</td>
          </tr>
          <tr>
            <th class="blue">Facultad</th>
            <td>{{ $academico->departamento->facultad->id }}  - {{ $academico->departamento->facultad->Nombre }}</td>
          </tr>
          <tr>
            <th class="blue">Departamento</th>
            <td>{{ $academico->CodigoDpto }}  - {{ $academico->departamento->Nombre }}</td>
          </tr>
          <tr>
            <th class="blue">Categoria</th>
            <td>{{ $academico->Categoria }}</td>
          </tr>
          <tr>
            <th class="blue">Horas de Contrato</th>
            <td>{{ $academico->HorasContrato }}</td>
          </tr>
          <tr>
            <th class="blue">Tipo de Planta</th>
            <td>{{ $academico->TipoPlanta }}</td>
          </tr>
          <tr>
            <th class="blue">Estado</th>
            <td>@if ($academico->deleted_at == NULL) Activo @else Inactivo @endif</td>
          </tr>
        </tbody>
			</table>
    </div>
	</div>
</div>

@endsection
