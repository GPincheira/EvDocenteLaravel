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

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Se ha detectado un problema.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
  <div class="row justify-content-center text-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><h3>Proceso de Evaluacion</h3></div>
        <div class="card-body">
          <h3>El proceso actualmente se encuentra @if ($proceso->inicio<=date('Y-m-d') && $proceso->fin>=date('Y-m-d')) ABIERTO @else CERRADO @endif</h3><br>
          <div class="col-md-6">
              <h4>Proceso Manual</h4><br>
              @if ($proceso->inicio<=date('Y-m-d') && $proceso->fin>=date('Y-m-d'))
                <form action="{{ route('procesos.cerrar',$proceso->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger btn-lg text-center"><i class="material-icons">remove_circle_outline</i><br>Cerrar Proceso</button>
                </form>
              @else
                <form action="{{ route('procesos.abrir',$proceso->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" >refresh</i><br>Abrir Proceso</button>
                </form>
              @endif
          </div>
          <div class="col-md-6">
            <h4>Proceso Automatico</h4>
            <form action="{{ route('procesos.update',$proceso->id) }}" method="POST">
                @csrf
                @method('PUT')
               <div class="form-group">
                 <strong>Fecha inicio:</strong>
                 <input type="date" name="inicio" value="{{ $proceso->inicio }}" class="form-control" min={{$fecha}} max={{$fin}} required>
               </div>
               <div class="form-group">
                 <strong>Fecha final:</strong>
                 <input type="date" name="fin" value="{{ $proceso->fin }}" class="form-control" min={{$fecha}} max={{$fin}} required>
               </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
