@extends('layouts.app')
<title>Incio</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  {{--Mensaje de bienvenida para el usuario que inicio sesion --}}
                  <evaluacion-componentrespaldo></evaluacion-componentrespaldo>
                    <div class="card-header"><h3>¡Bienvenido!</h3></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3> Iniciaste sesion como : {{ @Auth::user()->Nombre }}</h3>
                        @if(@Auth::user()->hasRole('Administrador'))
                          <h3>Tu rol: Administrador</h3>
                        @endif
                        @if(@Auth::user()->hasRole('SecFacultad'))
                          <h3>Tu rol: Secretario de Facultad</h3>
                          <h3>Tu Facultad: {{ @Auth::user()->secFacultad->CodigoFacultad }} - {{ @Auth::user()->secFacultad->facultad->Nombre }}</h3>

                        @endif
                        @if(@Auth::user()->hasRole('Secretario'))
                          <h3>Tu rol: Secretario</h3>
                        @endif
                        <br>Rut : {{ @Auth::user()->id }}-{{ @Auth::user()->verificador }}
                        <br>Email : {{ @Auth::user()->email }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
