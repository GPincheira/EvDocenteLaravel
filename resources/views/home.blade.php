@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    @if(@Auth::user()->hasRole('Administrador'))
                      <h2>Bienvenido Administrador</h2>
                    @endif
                    @if(@Auth::user()->hasRole('SecFacultad'))
                      {{ @Auth::user()->CodigoFacultad }}
                      <h2>(@Auth::user()->Nombre</h2>
                      <h2>Bienvenido Secretario de Facultad</h2>
                    @endif
                    @if(@Auth::user()->hasRole('Secretario'))
                      <h2>Bienvenido Secretario</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
