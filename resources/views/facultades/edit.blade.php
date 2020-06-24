@extends('layouts.app')
<title>Editar {{ $facultad->Nombre }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('facultades.index') }}">Facultades</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar {{ $facultad->Nombre }}</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Facultad</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('facultades.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
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

    <form action="{{ route('facultades.update',$facultad->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Id Facultad:</strong>
                   <input type="integer" name="id" value="{{ $facultad->id }}" class="form-control">
               </div>
           </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre Facultad:</strong>
                    <input type="text" name="Nombre" value="{{ $facultad->Nombre }}" class="form-control">
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Nombre Decano:</strong>
                    <input type="text" name="DecanoNombre" value="{{ $facultad->DecanoNombre }}" class="form-control" placeholder="Ingrese Nombre Decano">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <br><input type="text" name="DecanoAPaterno" value="{{ $facultad->DecanoAPaterno }}" class="form-control" placeholder="Ingrese AP Decano">
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <br><input type="text" name="DecanoAMaterno" value="{{ $facultad->DecanoAMaterno }}" class="form-control" placeholder="Ingrese AM Decano">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Estado:</strong>
                    <select name="deleted_at" class="form-control">
                      <option value="Activo">Activo</option>
                      <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </form>
@endsection
