@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Academicos UCM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('academicos.create') }}"> Crear Nuevo Academico</a>
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
            <th>RUT</th>
            <th>Nombre Completo</th>
            <th>Titulo Profesional</th>
            <th>Grado Academico</th>
            <th>Codigo de Dpto</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($academicos as $academico)
        <tr>
            <td>{{ $academico->id }}-{{ $academico->verificador }}</td>
            <td>{{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
            <td>{{ $academico->TituloProfesional }}</td>
            <td>{{ $academico->GradoAcademico }}</td>
            <td>{{ $academico->CodigoDpto }}</td>
            <td>{{ $academico->Estado }}</td>
            <td>
                <form action="{{ route('academicos.destroy',$academico->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('academicos.show',$academico->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('academicos.edit',$academico->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>

    {!! $academicos->links() !!}

@endsection
