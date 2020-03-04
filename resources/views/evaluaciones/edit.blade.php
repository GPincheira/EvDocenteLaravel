@extends('evaluaciones.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Evaluacion</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('evaluaciones.index') }}"> Atras</a>
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

    <form action="{{ route('evaluaciones.update',$evaluacion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Codigo de la Comision:</strong>
                   <input type="integer" name="CodigoComision" value="{{ $evaluacion->CodigoComision }}" class="form-control" placeholder="Ingrese la comision evaluadora">
               </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>RUT Academico:</strong>
                   <input type="integer" name="RUTAcademico" value="{{ $evaluacion->RUTAcademico }}" class="form-control" placeholder="RUT academico a evaluar">
               </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Argumento:</strong>
                   <input type="text" name="Argumento" value="{{ $evaluacion->Argumento }}" class="form-control" placeholder="Escriba su argumento">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Ponderacion:</strong>
                   <input type="integer" name="P1" value="{{ $evaluacion->P1 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Nota 1:</strong>
                   <input type="decimal" name="N1" value="{{ $evaluacion->N1 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Ponderacion:</strong>
                   <input type="integer" name="P2" value="{{ $evaluacion->P2 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Nota 2:</strong>
                   <input type="decimal" name="N2" value="{{ $evaluacion->N2 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Ponderacion:</strong>
                   <input type="integer" name="P3" value="{{ $evaluacion->P3 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Nota 3:</strong>
                   <input type="decimal" name="N3" value="{{ $evaluacion->N3 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Ponderacion:</strong>
                   <input type="integer" name="P4" value="{{ $evaluacion->P4 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Nota 4:</strong>
                   <input type="decimal" name="N4" value="{{ $evaluacion->N4 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Ponderacion:</strong>
                   <input type="integer" name="P5" value="{{ $evaluacion->P5 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong>Nota 5:</strong>
                   <input type="decimal" name="N5" value="{{ $evaluacion->N5 }}" class="form-control">
             </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                   <button type="submit" class="btn btn-primary">Guardar</button>
           </div>
       </div>

    </form>
@endsection
