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
        }
        body {
            background-color: #f6f9f9;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            margin: 0;
            margin-bottom: 170px;
        }
        footer {
            background-color: rgb(0, 85, 169);
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 170px;
            color: white;
        }
    </style>

</head>
<body>
  <header>
      <!-- Esta funcion include pertmite que se vea el contenido del archivo nav contenido en temples/partials, este se mostrara en foma de barra en la parte superior de las paginas  -->
      @include('partials.header')
      @include('partials.nav')
  </header>
  <div id="app">
    <div class="container">
      <main class="mt-4">
            @yield('content')
        </main>
    </div>
  </div>


</body>
<footer>
  <div class="container bg-grey-lighter absolute pin-b pin-x p-8 pt-3 pb-3">
    @include('partials.footer')
  </div>
</footer>


</html>
