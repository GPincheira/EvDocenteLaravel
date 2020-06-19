<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UCM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html {
            min-height: 100%;
            position: relative;
            align-items: center;
            height: 100vh;
        }
        body {
            background-color: #f6f9f9;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            margin: 0;
            margin-bottom: 0;
            min-height: 100%;
            align-items: center;
            height: 100vh;
        }
        .full-height {
            height: 100vh;
        }
        .top-right {
            position: absolute;
            right: 0px;
            top: 0px;
        }
        .top-left {
            position: relative;
            left: 0;
            top: 0;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .posit {
            position: absolute;
        }
        .carousel-item {
            position: absolute;
            height: 100vh;
            min-height: 100px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
    </style>

</head>

<body>
    <div>
      <div id="carouselExampleControls" class="carousel slide full-height" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('/images/foto1.jpg') }}" class="d-block w-100" alt="4">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('/images/foto2.jpg') }}" class="d-block w-100" alt="4">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('/images/foto3.jpg') }}" class="d-block w-100" alt="4">
          </div>
        </div>
      </div>
      <div class="card full-height top-right">
          <div class="card-header text-center"><br><h4><u><b>SISTEMA DE<br>EVALUACION DOCENTE</b></u></h4><br></div>
          <div class="card-body"><br>
              <img src="{{ asset('/images/logo.png') }}" class="logo flex-center" width="300" height="105">
              <br><br>
              <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group row">
                      <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('RUT') }}</label>
                      <div class="col-md-6">
                          <input id="id" type="integer" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id">
                          @error('id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <div class="col-md-6 offset-md-4">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              <label class="form-check-label" for="remember">
                                  {{ __('Recordar') }}
                              </label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Ingresar') }}
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
    </div>
</body>

</html>
