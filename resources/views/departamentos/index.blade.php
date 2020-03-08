@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Departamentos UCM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('departamentos.create') }}"> Crear Nuevo Departamento</a>
            </div>
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
            <td>{{ $departamento->Estado }}</td>
            <td>
                <form action="{{ route('departamentos.destroy',$departamento->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('departamentos.show',$departamento->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('departamentos.edit',$departamento->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>

    {!! $departamentos->links() !!}

@endsection
