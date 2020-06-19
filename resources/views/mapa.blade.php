@extends('layouts.app')

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h2>Mapa del Sitio</h2>
          </div>
          @if(@Auth::user()->hasRole('Administrador'))
            <div class="row">
              <div class="col-md-6">
                <h3>Academicos</h3>
                <li><a href="{{ url('/') }}">Listado Academicos</a></li>
                <li><a href="{{ url('/') }}">Listado Academicos Inactivos</a></li><hr>

                <h3>Comisiones</h3>
                <li><a href="{{ url('/') }}">Listado Comisiones</a></li><hr>

                <h3>Departamentos</h3>
                <li><a href="{{ url('/') }}">Listado Departamentos</a></li>
                <li><a href="{{ url('/') }}">Listado Departamentos Inactivos</a></li><hr>
                <li><a href="{{ url('/') }}">Añadir Departamento</a></li><hr>

                <h3>Evaluaciones</h3>
                <li><a href="{{ url('/') }}">Listado Evaluaciones</a></li><hr>

                <h3>Facultades</h3>
                <li><a href="{{ url('/') }}">Listado Facultades</a></li>
                <li><a href="{{ url('/') }}">Listado Facultades Inactivas</a></li>
                <li><a href="{{ url('/') }}">Añadir Facultad</a></li><hr>

              </div>
              <div class="col-md-6">
                <h3>Administradores</h3>
                <li><a href="{{ url('/') }}">Listado Administradores</a></li>
                <li><a href="{{ url('/') }}">Listado Administradores Inactivos</a></li>
                <li><a href="{{ url('/') }}">Añadir Administrador</a></li><hr>

                <h3>Secretarios de Facultad</h3>
                <li><a href="{{ url('/') }}">Listado Secretarios de Facultad</a></li>
                <li><a href="{{ url('/') }}">Listado Secretarios de Facultad Inactivos</a></li>
                <li><a href="{{ url('/') }}">Añadir Secretario de Facultad</a></li><hr>

                <h3>Secretarios</h3>
                <li><a href="{{ url('/') }}">Listado Secretarios</a></li>
                <li><a href="{{ url('/') }}">Listado Secretarios Inactivos</a></li>
                <li><a href="{{ url('/') }}">Añadir Secretario</a></li><hr>
              </div>
            </div>
          @endif

          @if(@Auth::user()->hasRole('SecFacultad'))
            <div class="row">
              <div class="col-md-6">
                <h3>Academicos</h3>
                <li><a href="{{ url('/') }}">Listado Academicos</a></li>
                <li><a href="{{ url('/') }}">Listado Academicos Inactivos</a></li>
                <li><a href="{{ url('/') }}">Añadir Academico</a></li><hr>

                <h3>Comisiones</h3>
                <li><a href="{{ url('/') }}">Listado Comisiones</a></li>
                <li><a href="{{ url('/') }}">Añadir Comision</a></li><hr>

                <h3>Evaluaciones</h3>
                <li><a href="{{ url('/') }}">Listado Evaluaciones</a></li>
                <li><a href="{{ url('/') }}">Listado Evaluaciones Eliminadas</a></li>
                <li><a href="{{ url('/') }}">Realizar Evaluacion</a></li><hr>
              </div>

              <div class="col-md-6">

              </div>
            </div>
          @endif

          @if(@Auth::user()->hasRole('Secretario'))
            <div class="row">
              <div class="col-md-6">
                <h3>Evaluaciones</h3>
                <li><a href="{{ url('/') }}">Listado Evaluaciones</a></li>
                <li><a href="{{ url('/') }}">Listado Evaluaciones Eliminadas</a></li>
                <li><a href="{{ url('/') }}">Listado Evaluaciones con Excelencia</a></li><hr>
              </div>

              <div class="col-md-6">

              </div>
            </div>
          @endif

          <div class="row">
            <div class="col-md-12">
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
