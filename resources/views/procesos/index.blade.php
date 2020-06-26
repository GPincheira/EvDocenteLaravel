@extends('layouts.app')
<title>Periodo Evaluacion UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Periodos Evaluacion UCM</li>
  </ol>
</nav>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

        @foreach ($procesos as $proceso)
              @if ($proceso->fin <= date('Y-m-d'))
              <div class="container">
                  <div class="row justify-content-center text-center">
                      <div class="col-md-8">
                          <div class="card">
                              <div class="card-header"><h3>Proceso de Evaluacion</h3></div>
                              <div class="card-body">
                                <h3>El proceso actualmente se encuentra CERRADO</h3>
                                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <form action="{{ route('procesos.abrir',$proceso->id) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-success btn-sm"><i class="material-icons" >refresh</i><br>Abrir Proceso</button>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @else
          <div class="container">
              <div class="row justify-content-center text-center">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-header"><h3>Proceso de Evaluacion</h3></div>
                          <div class="card-body">
                              <h3>El proceso actualmente se encuentra ABIERTO</h3>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                  <form action="{{ route('procesos.cerrar',$proceso->id) }}" method="POST">
                                    @csrf
                                  <button type="submit" class="btn btn-danger btn-sm text-center"><i class="material-icons">remove_circle_outline</i><br>Cerrar Proceso</button>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        @endif
    @endforeach

    {!! $procesos->links() !!}

@endsection
