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

@if (Session::has('message'))
<div class="alert alert-danger">{{Session::get('message')}}</div>
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



@endsection
