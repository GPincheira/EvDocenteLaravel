@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Evaluaciones UCM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('evaluaciones.create') }}"> Realizar Nueva Evaluacion</a>
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
            <th>Codigo Comision</th>
            <th>RUT del Academico</th>
            <th>Nota Final</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($evaluaciones as $evaluacion)
        <tr>
            <td>{{ $evaluacion->id }}</td>
            <td>{{ $evaluacion->CodigoComision }}</td>
            <td>{{ $evaluacion->RUTAcademmico }}</td>
            <td>{{ $comision->NotaFinal }}</td>
            <td>
                <form action="{{ route('evaluaciones.destroy',$evaluacion->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('evaluaciones.show',$evaluacion->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('evaluaciones.edit',$evaluacion->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>

        </tr>
        @endforeach
    </table>

    {!! $evaluaciones->links() !!}

@endsection
