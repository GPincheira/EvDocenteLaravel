@extends('layouts.app')
<title>Incio</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                  <evaluacion-component></evaluacion-component><!--Añadimos nuestro componente vuejs-->

                  {{--Mensaje de bienvenida para el usuario que inicio sesion --}}
                    <div class="card-header">Bienvenido!</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2> Iniciaste sesion como : {{ @Auth::user()->Nombre }}</h2>
                        @if(@Auth::user()->hasRole('Administrador'))
                          <h2>Tu rol: Administrador</h2>
                        @endif
                        @if(@Auth::user()->hasRole('SecFacultad'))
                          <h2>Tu rol: Secretario de Facultad</h2>
                          Codigo de tu Facultad: {{ @Auth::user()->secFacultad->CodigoFacultad }}
                        @endif
                        @if(@Auth::user()->hasRole('Secretario'))
                          <h2>Tu rol: Secretario</h2>
                        @endif
                        <br>Rut : {{ @Auth::user()->id }}-{{ @Auth::user()->verificador }}
                        <br>Email : {{ @Auth::user()->email }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
