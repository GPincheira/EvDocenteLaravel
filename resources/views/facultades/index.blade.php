@extends('facultades.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Facultades UCM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('facultades.create') }}"> Crear Nueva Facultad</a>
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
            <th>Decano</th>
            <th>Ap</th>
            <th>Mat</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($facultades as $facultad)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $facultad->Nombre }}</td>
            <td>{{ $facultad->DecanoNombre }}</td>
            <td>{{ $facultad->DecanoAPaterno }}</td>
            <td>{{ $facultad->DecanoAMaterno }}</td>
            <td>{{ $facultad->Estado }}</td>
            <td>
                <form action="{{ route('facultades.destroy',$facultad->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('facultades.show',$facultad->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('facultades.edit',$facultad->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>

    {!! $facultades->links() !!}

@endsection
