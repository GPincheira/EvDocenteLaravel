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
          <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <form action="{{ route('procesos.cambiar') }}" method="GET">
                       <div><h4>Año de Evaluación:</h4></div>
                       <div class="col-xs-11 col-sm-11 col-md-11">
                         <select name="año" class="form-control">
                           @foreach($procesos as $proceso)
                              <option value='{{$proceso->año}}' @if($activo->año==$proceso->año) selected >{{$proceso->año}} (Activo) @else >{{$proceso->año}} @endif </option>
                           @endforeach
                         </select>
                       </div>
                       <div class="col-xs-1 col-sm-1 col-md-1">
                         <div class="pull-right">
                           <button type="submit" class="btn btn-primary">Cambiar</button>
                         </div>
                       </div>
                     </form>
                   </div>
               </div><hr>


          <h3>El proceso actualmente se encuentra @if ($activo->inicio<=date('Y-m-d') && $activo->fin>=date('Y-m-d')) ABIERTO @else CERRADO @endif</h3><br>
          <div class="col-md-6">
              <h4>Proceso Manual</h4><br>
              @if ($activo->inicio<=date('Y-m-d') && $activo->fin>=date('Y-m-d'))
                <form action="{{ route('procesos.cerrar',$activo->año) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger btn-lg text-center"><i class="material-icons">remove_circle_outline</i><br>Cerrar Proceso</button>
                </form>
              @else
                <form action="{{ route('procesos.abrir',$activo->año) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" >refresh</i><br>Abrir Proceso</button>
                </form>
              @endif
          </div>
          <div class="col-md-6">
            <h4>Proceso Automatico</h4>
            <form action="{{ route('procesos.update',$activo->año) }}" method="POST">
                @csrf
                @method('PUT')
               <div class="form-group">
                 <strong>Fecha inicio:</strong>
                 <input type="date" name="inicio" value="{{ $activo->inicio }}" class="form-control" min={{$fecha}} max={{$fin}} required>
               </div>
               <div class="form-group">
                 <strong>Fecha final:</strong>
                 <input type="date" name="fin" value="{{ $activo->fin }}" class="form-control" min={{$fecha}} max={{$fin}} required>
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
