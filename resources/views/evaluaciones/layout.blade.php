<!DOCTYPE html>
<html>
<head>
    <title>Evaluaciones UCM</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>

<body>
  <header>
      <!-- Esta funcion include pertmite que se vea el contenido del archivo nav contenido en temples/partials, este se mostrara en foma de barra en la parte superior de las paginas  -->
      @include('partials.nav')
    </header>

<div class="container">
    @yield('content')
</div>

</body>
</html>
