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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        html {
            min-height: 100%;
            position: relative;
        }
        body {
            background-color: #f6f9f9;
            color: #000000;
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
        .material-icons {
            color: #f7f7f7;
        }
        .btn{
            margin: 1px;
        }
        .btn-warning{
            background-color: #d4b153;
        }
        .btn-info{
            color: #f7f7f7;
        }
        .btn:hover{
            opacity: 0.5;
            -moz-opacity: 0.5;
            filter:alpha (opacity=0.5);
        }
        .blue{
          background-color: rgb(0, 85, 169);
          color: white;
          text-align: right;
        }
        .content {
            text-align: center;
        }
        .izq {
            text-align: left;
        }
        .wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 0px;
            grid-auto-rows: minmax(100px, auto);
        }
        .one {
            grid-column: 1;
            grid-row: 1;
        }
        .two {
            grid-column: 2;
            grid-row: 1;
        }
        .three {
            grid-column: 3;
            grid-row: 1;
        }
        .four {
            grid-column: 3;
            grid-row: 2;
        }
        .fecha {
          grid-column : 1;
          grid-row : 2;
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
