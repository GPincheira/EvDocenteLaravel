@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Realizar nueva Evaluacion</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('evaluaciones.index') }}"> Atras</a>
        </div>
    </div>
</div>

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

<form action="{{ route('evaluaciones.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Codigo de la Comision:</strong>
                <input type="integer" name="CodigoComision" class="form-control" placeholder="Ingrese la comision evaluadora">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>RUT Academico:</strong>
                <input type="integer" name="RUTAcademico" class="form-control" placeholder="RUT academico a evaluar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Argumento:</strong>
                <input type="text" name="Argumento" class="form-control" placeholder="Escriba su argumento">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ponderacion:</strong>
                <input type="float" name="p1" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota 1:</strong>
                <input type="float" name="n1" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ponderacion:</strong>
                <input type="float" name="p2" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota 2:</strong>
                <input type="float" name="n2" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ponderacion:</strong>
                <input type="float" name="p3" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota 3:</strong>
                <input type="float" name="n3" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ponderacion:</strong>
                <input type="float" name="p4" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota 4:</strong>
                <input type="float" name="n4" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ponderacion:</strong>
                <input type="float" name="p5" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota 5:</strong>
                <input type="float" name="n5" class="form-control">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>
@endsection
