@extends('layouts.app')
<title>Academicos UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Academicos</li>
  </ol>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Academicos UCM</h2>
        </div>

{{--Segun la pagina en la que se encuentra actualmente, se ofrecen alternativas de rutas--}}
        @if (Request::is('academicos'))
          <div class="pull-left">
              <a class="btn btn-success" href="{{ route('academicos.indexelim') }}"> Ver Inactivos</a>
          </div>

{{--Boton de Crear se activa solo si el usuario logeado es un secretario de facultad--}}
          @if(@Auth::user()->hasRole('SecFacultad'))
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('academicos.create') }}"> Crear Nuevo Academico</a>
            </div>
          @endif
        @else
        <div class="pull-left">
            <a class="btn btn-success" href="{{ route('academicos.index') }}"> Ver Activos</a>
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
<table class="table table-bordered">
    <tr>
        <th>RUT</th>
        <th>Nombre Completo</th>
        <th>Titulo Profesional</th>
        <th>Grado Academico</th>
        <th>Codigo de Dpto</th>
        <th>Estado</th>
        <th width="280px"/th>
    </tr>

{{--Si el usuario actual es sec de facultad, se enlistan solo academicos de su facultad --}}
    @if(@Auth::user()->hasRole('SecFacultad'))
      @foreach ($academicos as $academico)
        @foreach ($departamentos as $departamento)
         @if ($academico->CodigoDpto == $departamento->id)
          <tr>
            <td>{{ $academico->id }}-{{ $academico->verificador }}</td>
            <td>{{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
            <td>{{ $academico->TituloProfesional }}</td>
            <td>{{ $academico->GradoAcademico }}</td>
            <td>{{ $academico->CodigoDpto }} - {{ $departamento-> Nombre}}</td>
            <td>@if (Request::is('academicos'))Activo @else Inactivo @endif</td>
            <td>

      {{--Botones se muestran solo si se estan viendo los academicos activos --}}
              @if (Request::is('academicos'))
                <form action="{{ route('academicos.destroy',$academico->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('academicos.show',$academico->id) }}">Mostrar</a>
                    <a class="btn btn-primary" href="{{ route('academicos.edit',$academico->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Desactivar</button>
                </form>
              @else

    {{--Si esta en eliminados, se activa el boton reactivar solo si el registro padre (dpto) esta activo --}}
                @if ($academico->CodigoDpto == $departamento->id && $departamento->deleted_at==NULL)
                <form action="{{ route('academicos.reactivar',$academico->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Reactivar</button>
                </form>
                @endif
              @endif
            </td>
            @endif
          </tr>
        @endforeach
      @endforeach

{{--Si el usuario actual es administrador, se le muestran todos los academicos, sin boton de eliminar --}}
    @else
      @foreach ($academicos as $academico)
          <tr>
            <td>{{ $academico->id }}-{{ $academico->verificador }}</td>
            <td>{{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
            <td>{{ $academico->TituloProfesional }}</td>
            <td>{{ $academico->GradoAcademico }}</td>
            <td>{{ $academico->CodigoDpto }}</td>
            <td>@if (Request::is('academicos'))Activo @else Inactivo @endif</td>
            <td>
              @if (Request::is('academicos'))
                <form>
                    <a class="btn btn-info" href="{{ route('academicos.show',$academico->id) }}">Mostrar</a>
                </form>
              @endif
            </td>
          </tr>
      @endforeach
    @endif
</table>

{!! $academicos->links() !!}

@endsection
