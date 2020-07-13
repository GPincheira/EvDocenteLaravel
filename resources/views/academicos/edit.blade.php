@extends('layouts.app')
<title>Editar Academico {{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</title>
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('academicos.index') }}">Academicos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Academico: {{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</li>
  </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Academico {{ $academico->Nombre }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('academicos.index') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
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
  @if(@Auth::user()->hasRole('SecFacultad'))
    <form action="{{ route('academicos.update',$academico) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-xs-2 col-sm-2 col-md-2">
              <div class="form-group">
                  <strong>RUT:</strong>
                  <input type="integer" name="id" value="{{ $academico->id }}" class="form-control" placeholder="Ingrese el RUT">
              </div>
          </div>
          <div class="col-xs-1 col-sm-1 col-md-1">
              <div class="form-group">
                  <br><input type="text" name="verificador" value="{{ $academico->verificador }}" class="form-control" placeholder="Ingrese el verificador">
              </div>
          </div>
        </div>
        <div class="row">
           <div class="col-xs-4 col-sm-4 col-md-4">
               <div class="form-group">
                   <strong>Nombre Completo:</strong>
                   <input type="text" name="Nombre" value="{{ $academico->Nombre }}" class="form-control" placeholder="Ingrese el nombre del Academico">
               </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
               <div class="form-group">
                   <br><input type="text" name="ApellidoPaterno" value="{{ $academico->ApellidoPaterno }}" class="form-control" placeholder="Ingrese el Apellido Paterno">
               </div>
           </div>
           <div class="col-xs-4 col-sm-4 col-md-4">
               <div class="form-group">
                   <br><input type="text" name="ApellidoMaterno" value="{{ $academico->ApellidoMaterno }}" class="form-control" placeholder="Ingrese Apellido Materno">
               </div>
           </div>
        </div>
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Titulo Profesional:</strong>
                   <input type="text" name="TituloProfesional" value="{{ $academico->TituloProfesional }}"class="form-control" placeholder="Ingrese el Titulo Profesional">
               </div>
           </div>
        </div>
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Grado Academico:</strong>
                   <input type="text" name="GradoAcademico" value="{{ $academico->GradoAcademico }}" class="form-control" placeholder="Ingrese el Grado Academico">
               </div>
           </div>
        </div>
        <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Departamento al que pertenece:</strong>
                     <select name="CodigoDpto" class="form-control">
                       @foreach($departamentos as $departamento)
                           @foreach($secFacultades as $secFacultad)
                           @if(@Auth::user()->id == $secFacultad->id && $secFacultad->CodigoFacultad == $departamento->CodigoFacultad)
                             <option value='{{$departamento->id}}' @if($academico->CodigoDpto==$departamento->id) selected @endif >{{$departamento->id}} - {{$departamento->Nombre}}</option>
                           @endif
                           @endforeach
                       @endforeach
                     </select>
                 </div>
             </div>
          </div>
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Categoria:</strong>
                   <select name="Categoria" class="form-control">
                     <option value="Instructor" @if($academico->Categoria=="Instructor") selected @endif>Instructor</option>
                     <option value="Auxiliar" @if($academico->Categoria=="Auxiliar") selected @endif>Auxiliar</option>
                     <option value="Adjunto" @if($academico->Categoria=="Adjunto") selected @endif>Adjunto</option>
                     <option value="Titular" @if($academico->Categoria=="Titular") selected @endif>Titular</option>
                   </select>
               </div>
           </div>
        </div>
        <div class="row">
           <div class="col-xs-3 col-sm-3 col-md-3">
               <div class="form-group">
                   <strong>Horas de contrato:</strong>
                   <input type="integer" name="HorasContrato" value="{{ $academico->HorasContrato }}" class="form-control" placeholder="Ingrese cantidad de horas de contrato">
               </div>
           </div>
        </div>
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>TIpo de Planta:</strong>
                   <input type="text" name="TipoPlanta" value="{{ $academico->TipoPlanta }}" class="form-control" placeholder="Ingrese el tipo de Planta">
               </div>
           </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
  @else
  <form action="{{ route('academicos.update2',$academico->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Departamento al que pertenece:</strong>
                   <select name="CodigoDpto" class="form-control">
                     @foreach($departamentos as $departamento)
                        <option value='{{$departamento->id}}' @if($academico->CodigoDpto==$departamento->id) selected @endif >{{$departamento->id}} - {{$departamento->Nombre}}</option>
                     @endforeach
                   </select>
               </div>
           </div>
        </div>
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </div>
  </form>
  @endif
@endsection
