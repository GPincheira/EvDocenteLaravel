@extends('layouts.app')
<title>Editar Comision UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item"><a href="#">Comisiones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Comision {{ $comision->id }}</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Comision</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('comisiones.index') }}"> Atras</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{--Funcionamiento similar al create, pero estos datos son pasados a update para validar --}}
    <form action="{{ route('comisiones.update',$comision->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Año:</strong>
                   <input type="year" name="Año" value="{{ $comision->Año }}" class="form-control" placeholder="Ingrese el año">
               </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Fecha de comision:</strong>
                   <input type="timedate" name="Fecha" value="{{ $comision->Fecha }}" class="form-control" placeholder="Ingrese la fecha">
               </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Nombre del participante 1:</strong>
                   <input type="text" name="Nombre1" value="{{ $comision->Nombre1 }}" class="form-control" placeholder="Ingrese el nombre del primer integrante extra">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Nombre del participante 2:</strong>
                   <input type="text" name="Nombre2" value="{{ $comision->Nombre2 }}" class="form-control" placeholder="Ingrese el nombre del segundo integrante extra">
             </div>
           </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </form>
@endsection
