@extends('layouts.app')
<title>Crear Academico UCM</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('academicos.index') }}">Academicos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Academico</li>
  </ol>
</nav>

{{--Boton con enlace para volver atras (al index)--}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo Academico</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('academicos.index') }}"> Atras</a>
        </div>
    </div>
</div>

{{--Mensaje de error si fuese el caso --}}
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

{{--Formulario que luego de ser completado se envía a store de academicos para ser procesado--}}
<form action="{{ route('academicos.store') }}" method="POST">
    @csrf
     <div class="row">
       <div class="col-xs-5 col-sm-5 col-md-5">
           <div class="form-group">
               <strong>RUT:</strong>
               <input type="integer" name="id" class="form-control" placeholder="Ingrese el RUT">
           </div>
       </div>
       <div class="col-xs-2 col-sm-2 col-md-2">
           <div class="form-group">
               <strong>verificador:</strong>
               <input type="text" name="verificador" class="form-control" placeholder="Ingrese el verificador">
           </div>
       </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="Nombre" class="form-control" placeholder="Ingrese el nombre del Academico">
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Apellido Paterno:</strong>
                <input type="text" name="ApellidoPaterno" class="form-control" placeholder="Ingrese el Apellido Paterno">
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Apellido Materno:</strong>
                <input type="text" name="ApellidoMaterno" class="form-control" placeholder="Ingrese Apellido Materno">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo Profesional:</strong>
                <input type="text" name="TituloProfesional" class="form-control" placeholder="Ingrese el Titulo Profesional">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Grado Academico:</strong>
                <input type="text" name="GradoAcademico" class="form-control" placeholder="Ingrese el Grado Academico">
            </div>
        </div>

{{--Se recorren los dptos para enlistar solo los que pertenezcan a la misma facultad que el secretario de facultad que está trabajando--}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departamento al que pertenece:</strong>
                <select name="CodigoDpto" class="form-control">
                  @foreach($departamentos as $departamento)
                    @foreach($secFacultades as $secFacultad)
                    @if(@Auth::user()->id == $secFacultad->id && $secFacultad->CodigoFacultad == $departamento->CodigoFacultad)
                      <option value='{{$departamento->id}}'>{{$departamento->id}} - {{$departamento->Nombre}}</option>
                    @endif
                    @endforeach
                  @endforeach
                </select>
            </div>
        </div>
  {{--Para eleccion de categoria se enlistan opciones estaticas--}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                <select name="Categoria" class="form-control">
                  <option value="Instructor">Instructor</option>
                  <option value="Auxiliar">Auxiliar</option>
                  <option value="Adjunto">Adjunto</option>
                  <option value="Titular">Titular</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Horas de contrato:</strong>
                <input type="integer" name="HorasContrato" class="form-control" placeholder="Ingrese cantidad de horas de contrato">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo de Planta:</strong>
                <input type="text" name="TipoPlanta" class="form-control" placeholder="Ingrese el tipo de Planta">
            </div>
        </div>

      {{--Boton para terminar el proceso--}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>
@endsection
