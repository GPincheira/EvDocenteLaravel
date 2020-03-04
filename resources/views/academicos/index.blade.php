@extends('academicos.layout')

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
            <th>verificador</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Titulo Profesional</th>
            <th>Grado Academico</th>
            <th>Codigo de Dpto</th>
            <th>Categoria</th>
            <th>Horas de Contrato</th>
            <th>Tipo de Planta</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($academicos as $academico)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $academico->Rut }}</td>
            <td>{{ $academico->verificador }}</td>
            <td>{{ $academico->Nombre }}</td>
            <td>{{ $academico->ApellidoPaterno }}</td>
            <td>{{ $academico->ApellidoMaterno }}</td>
            <td>{{ $academico->TituloProfesional }}</td>
            <td>{{ $academico->GradoAcademico }}</td>
            <td>{{ $academico->CodigoDpto }}</td>
            <td>{{ $academico->Categoria }}</td>
            <td>{{ $academico->HorasContrato }}</td>
            <td>{{ $academico->TipoPlanta }}</td>
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
