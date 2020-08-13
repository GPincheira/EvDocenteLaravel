<nav style="background-color: rgb(0, 85, 169)" class="navbar navbar-expand-lg navbar-dark ">
  <a class="navbar-brand" href="{{ url('/') }}"><i class="material-icons" >home</i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Lado Izquierdo de Navbar -->
      <ul class="navbar-nav mr-auto">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            @if(Auth::user())
              @if(@Auth::user()->hasRole('Administrador'))
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('academicos.index')}}">Academicos</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('comisiones.index')}}">Comisiones</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('departamentos.index')}}">Departamentos</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('evaluaciones.index')}}">Evaluaciones</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('facultades.index')}}">Facultades</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('procesos.index')}}">Procesos</a>
                </li>
                <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Usuarios<span class="caret"></span></a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('users.index') }}" >{{ __('Administradores') }}</a>
                              <a class="dropdown-item" href="{{ route('users.index2') }}" >{{ __('Secretarios de Facultad') }}</a>
                              <a class="dropdown-item" href="{{ route('users.index3') }}" >{{ __('Secretarias') }}</a>
                          </div>
                      </li>
                </ul>

              @endif
              @if(@Auth::user()->hasRole('SecFacultad'))
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('academicos.index')}}">Academicos</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('comisiones.index')}}">Comisiones</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('evaluaciones.index')}}">Evaluaciones</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('graficos.principal')}}">Graficos</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('reportes.index')}}">Reportes</a>
                </li>
              @endif
              @if(@Auth::user()->hasRole('Secretario'))
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('evaluaciones.index')}}">Evaluaciones año actual</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('evaluaciones.index2')}}">Evaluaciones con Excelencia</a>
                </li>
                <li class="nav navbar-nav">
                  <a class="nav-link" href="{{ route('reportes.index')}}">Reportes</a>
                </li>
              @endif

            @endif
          </ul>
        </div>
      </ul>

      <!-- Lado derecho de Navbar -->
      <ul class="navbar-nav ml-auto">
          <!-- Opciones de autenticacion y logeo -->
          @if(Auth::user())
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->Nombre }} {{ Auth::user()->ApellidoPaterno }} {{ Auth::user()->ApellidoMaterno }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Cerrar Sesion') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endif
      </ul>
  </div>
</nav>
