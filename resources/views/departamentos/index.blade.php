@extends('layouts.app')
<title>Departamentos UCM</title>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Departamentos UCM</h2>
            </div>
            @if (Request::is('departamentos'))
              <div class="pull-left">
                  <a class="btn btn-success" href="{{ route('departamentos.indexelim') }}"> Ver Inactivos</a>
              </div>
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('departamentos.create') }}"> Crear Nuevo Departamento</a>
              </div>
            @else
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('departamentos.index') }}"> Ver Activos</a>
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
            <th>Nombre</th>
            <th>Codigo Facultad</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>

          @foreach ($departamentos as $departamento)

            <tr>
                <td>{{ $departamento->id }}</td>
                <td>{{ $departamento->Nombre }}</td>
                <td>{{ $departamento->CodigoFacultad }}</td>
                <td>@if (Request::is('departamentos'))Activo @else Inactivo @endif</td>
                <td>
                  @if (Request::is('departamentos'))
                    <form action="{{ route('departamentos.destroy',$departamento->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('departamentos.show',$departamento->id) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('departamentos.edit',$departamento->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Desactivar</button>
                    </form>
                  @else
                    @foreach ($facultades as $facultad)
                    @if ($departamento->CodigoFacultad == $facultad->id && $facultad->deleted_at==NULL)
                    <form action="{{ route('departamentos.reactivar',$departamento->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reactivar</button>
                    </form>
                    @endif
                    @endforeach
                  @endif
                </td>

            </tr>

        @endforeach
    </table>

    {!! $departamentos->links() !!}

@endsection
