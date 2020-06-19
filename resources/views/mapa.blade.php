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
                <li><a href="{{ route('academicos.index') }}">Listado Academicos</a></li>
                <li><a href="{{ route('academicos.indexelim') }}">Listado Academicos Inactivos</a></li><hr>

                <h3>Comisiones</h3>
                <li><a href="{{ route('comisiones.index') }}">Listado Comisiones</a></li><hr>

                <h3>Departamentos</h3>
                <li><a href="{{ route('departamentos.index') }}">Listado Departamentos</a></li>
                <li><a href="{{ route('departamentos.indexelim') }}">Listado Departamentos Inactivos</a></li>
                <li><a href="{{ route('departamentos.create') }}">Añadir Departamento</a></li><hr>

                <h3>Evaluaciones</h3>
                <li><a href="{{ route('evaluaciones.index') }}">Listado Evaluaciones</a></li><hr>

                <h3>Facultades</h3>
                <li><a href="{{ route('facultades.index') }}">Listado Facultades</a></li>
                <li><a href="{{ route('facultades.indexelim') }}">Listado Facultades Inactivas</a></li>
                <li><a href="{{ route('facultades.create') }}">Añadir Facultad</a></li><hr>

              </div>
              <div class="col-md-6">
                <h3>Administradores</h3>
                <li><a href="{{ route('users.index') }}">Listado Administradores</a></li>
                <li><a href="{{ route('users.indexelim') }}">Listado Administradores Inactivos</a></li>
                <li><a href="{{ route('users.create') }}">Añadir Administrador</a></li><hr>

                <h3>Secretarios de Facultad</h3>
                <li><a href="{{ route('users.index2') }}">Listado Secretarios de Facultad</a></li>
                <li><a href="{{ route('users.index2elim') }}">Listado Secretarios de Facultad Inactivos</a></li>
                <li><a href="{{ route('users.create2') }}">Añadir Secretario de Facultad</a></li><hr>

                <h3>Secretarios</h3>
                <li><a href="{{ route('users.index3') }}">Listado Secretarios</a></li>
                <li><a href="{{ route('users.index3elim') }}">Listado Secretarios Inactivos</a></li>
                <li><a href="{{ route('users.create3') }}">Añadir Secretario</a></li><hr>
              </div>
            </div>
          @endif

          @if(@Auth::user()->hasRole('SecFacultad'))
            <div class="row">
              <div class="col-md-6">
                <h3>Academicos</h3>
                <li><a href="{{ route('academicos.index') }}">Listado Academicos</a></li>
                <li><a href="{{ route('academicos.indexelim') }}">Listado Academicos Inactivos</a></li>
                <li><a href="{{ route('academicos.create') }}">Añadir Academico</a></li><hr>

                <h3>Comisiones</h3>
                <li><a href="{{ route('comisiones.index') }}">Listado Comisiones</a></li>
                <li><a href="{{ route('comisiones.create') }}">Añadir Comision</a></li><hr>

                <h3>Evaluaciones</h3>
                <li><a href="{{ route('evaluaciones.index') }}">Listado Evaluaciones</a></li>
                <li><a href="{{ route('evaluaciones.indexelim') }}">Listado Evaluaciones Eliminadas</a></li>
                <li><a href="{{ route('evaluaciones.create') }}">Realizar Evaluacion</a></li><hr>
              </div>

              <div class="col-md-6">

              </div>
            </div>
          @endif

          @if(@Auth::user()->hasRole('Secretario'))
            <div class="row">
              <div class="col-md-6">
                <h3>Evaluaciones</h3>
                <li><a href"{{ route('evaluaciones.index') }}">Listado Evaluaciones</a></li>
                <li><a href="{{ route('evaluaciones.indexelim') }}">Listado Evaluaciones Eliminadas</a></li>
                <li><a href="{{ route('evaluaciones.index2') }}">Listado Evaluaciones con Excelencia</a></li><hr>
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
