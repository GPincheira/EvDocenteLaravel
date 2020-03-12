@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Academicos UCM</h2>
            </div>
            @if (Request::is('academicos'))
              <div class="pull-left">
                  <a class="btn btn-success" href="{{ route('academicos.indexelim') }}"> Ver Inactivos</a>
              </div>
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

    <table class="table table-bordered">
        <tr>
            <th>RUT</th>
            <th>Nombre Completo</th>
            <th>Titulo Profesional</th>
            <th>Grado Academico</th>
            <th>Codigo de Dpto</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @if(@Auth::user()->hasRole('SecFacultad'))
          @foreach ($academicos as $academico)
            @foreach ($departamentos as $departamento)
             @if ($academico->CodigoDpto == $departamento->id)
              <tr>
                <td>{{ $academico->id }}-{{ $academico->verificador }}</td>
                <td>{{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
                <td>{{ $academico->TituloProfesional }}</td>
                <td>{{ $academico->GradoAcademico }}</td>
                <td>{{ $academico->CodigoDpto }}</td>
                <td>@if (Request::is('academicos'))Activo @else Inactivo @endif</td>
                <td>
                  @if (Request::is('academicos'))
                    <form action="{{ route('academicos.destroy',$academico->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('academicos.show',$academico->id) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('academicos.edit',$academico->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Desactivar</button>
                    </form>
                  @else
                    <form action="{{ route('academicos.reactivar',$academico->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reactivar</button>
                    </form>
                  @endif
                </td>
                @endif
              </tr>
            @endforeach
          @endforeach
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
