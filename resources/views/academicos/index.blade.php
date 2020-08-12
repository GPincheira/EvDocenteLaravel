@extends('layouts.app')

@if(@Auth::user()->hasRole('Administrador'))
  <title>Academicos @if(Request::is('academicoselim')) Eliminados @endif UCM</title>
@else
  <title>Academicos @if(Request::is('academicoselim')) Eliminados @endif {{ @Auth::user()->SecFacultad->facultad->Nombre }} UCM</title>
@endif

@section('content')

@if(Request::is('academicos'))
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Academicos @if(@Auth::user()->hasRole('SecFacultad')) {{ @Auth::user()->secFacultad->facultad->Nombre }} @endif</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Academicos @if(@Auth::user()->hasRole('SecFacultad')) {{ @Auth::user()->secFacultad->facultad->Nombre }} @endif UCM</h2>
      </div>

  {{--Segun la pagina en la que se encuentra actualmente, se ofrecen alternativas de rutas--}}
      <div class="pull-left">
        <a class="btn btn-secondary" style="margin-left: 12px" href="{{ route('academicos.indexelim') }}"> Ver Inactivos</a>
      </div>

  {{--Boton de Crear se activa solo si el usuario logeado es un secretario de facultad--}}
      @if(@Auth::user()->hasRole('SecFacultad'))
        <div class="pull-right">
          <a class="btn btn-success" href="{{ route('academicos.create') }}"> Añadir Academico</a>
        </div>
      @endif
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

{{--Cabecera de la tabla --}}
  <table class="table table-bordered" style="margin-top: 8px">
    <tr>
      <th width="120px">RUT</th>
      <th>Nombre Completo</th>
      @if(@Auth::user()->hasRole('SecFacultad'))
        <th>Titulo Profesional</th>
        <th>Grado Academico</th>
      @endif
      @if(@Auth::user()->hasRole('Administrador'))
        <th>Facultad</th>
      @endif
      <th>Departamento</th>
    </tr>
    @foreach ($academicos as $academico)
      <tr>
        <td>{{ $academico->id }}-{{ $academico->verificador }}</td>
        <td>{{ $academico->Nombres }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
        @if(@Auth::user()->hasRole('SecFacultad'))
          <td>{{ $academico->TituloProfesional }}</td>
          <td>{{ $academico->GradoAcademico }}</td>
        @endif
        @if(@Auth::user()->hasRole('Administrador'))
          <td>{{ $academico->departamento->facultad->id }}  - {{ $academico->departamento->facultad->Nombre }}</td>
        @endif
        <td>{{ $academico->departamento->id }} - {{ $academico->departamento->Nombre}}</td>
        @if(@Auth::user()->hasRole('SecFacultad'))
          <td width="167px">
            <form action="{{ route('academicos.destroy',$academico->id) }}" method="POST">
              <a href="{{ route('academicos.show',$academico->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
              <a href="{{ route('academicos.edit',$academico->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" >remove_circle_outline</i></button>
            </form>
          </td>
        @else
        <td width="120px">
          <form>
              <a href="{{ route('academicos.show',$academico->id) }}" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
              <a href="{{ route('academicos.edit',$academico->id) }}" class="btn btn-warning btn-sm"><i class="material-icons">create</i></a>
          </form>
        </td>
        @endif
      </tr>
    @endforeach
  </table>

@else
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Academicos Eliminados @if(@Auth::user()->hasRole('SecFacultad')) {{ @Auth::user()->secFacultad->facultad->Nombre }} @endif</li>
  </ol>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2>Academicos Eliminados @if(@Auth::user()->hasRole('SecFacultad')) {{ @Auth::user()->secFacultad->facultad->Nombre }} @endif UCM</h2>
        </div>

{{--Segun la pagina en la que se encuentra actualmente, se ofrecen alternativas de rutas--}}
        <div>
            <a class="btn btn-info" style="margin-left: 12px" href="{{ route('academicos.index') }}"> Ver Activos</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

{{--Cabecera de la tabla --}}
<table class="table table-bordered" style="margin-top: 8px">
  <tr>
    <th width="120px">RUT</th>
    <th>Nombre Completo</th>
    <th>Titulo Profesional</th>
    <th>Grado Academico</th>
    <th>Departamento</th>
  </tr>
  @foreach ($academicos as $academico)
    <tr>
      <td>{{ $academico->id }}-{{ $academico->verificador }}</td>
      <td>{{ $academico->Nombres }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
      <td>{{ $academico->TituloProfesional }}</td>
      <td>{{ $academico->GradoAcademico }}</td>
      <td>{{ $academico->CodigoDpto }}</td>
      @if(@Auth::user()->hasRole('SecFacultad'))
        @foreach ($departamentos as $departamento)
          @if ($academico->CodigoDpto == $departamento->id && $departamento->deleted_at==NULL)
            <td width="60px">
              <form action="{{ route('academicos.reactivar',$academico->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i></button>
              </form>
            </td>
          @endif
        @endforeach
      @endif
    </tr>
  @endforeach
</table>

@endif

{!! $academicos->links() !!}

@endsection
