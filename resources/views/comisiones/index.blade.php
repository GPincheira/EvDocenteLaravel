@extends('comisiones.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Comisiones UCM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('comisiones.create') }}"> Crear Nueva Comision</a>
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
            <th>Año</th>
            <th>Fecha</th>
            <th>Codigo de la Facultad</th>
            <th>Nombre del Decano</th>
            <th>RUT del Sec de Facultad</th>
            <th>Nombre del Sec de Facultad</th>
            <th>Nombre 1</th>
            <th>Nombre 2</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($comisiones as $comision)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $comision->id }}</td>
            <td>{{ $comision->Año }}</td>
            <td>{{ $comision->Fecha }}</td>
            <td>{{ $comision->CodigoFacultad }}</td>
            <td>{{ $comision->NombreDecano }}</td>
            <td>{{ $comision->idSecFacultad }}</td>
            <td>{{ $comision->NombreSecFacultad }}</td>
            <td>{{ $comision->Nombre1 }}</td>
            <td>{{ $comision->Nombre2 }}</td>
            <td>{{ $comision->Estado }}</td>
            <td>
                <form action="{{ route('comisiones.destroy',$comision->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('comisiones.show',$comision->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('comisiones.edit',$comision->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>

    {!! $comisiones->links() !!}

@endsection
