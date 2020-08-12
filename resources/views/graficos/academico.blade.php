@extends('layouts.app')

<title>Graficos UCM</title>

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('graficos.principal') }}">Graficos Facultad/Dpto</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gráficos {{ $academico->Nombres }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="pull-left">
      <h2>Gráficos {{ $academico->Nombres }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }} {{ $año }}</h2>
    </div>
    <div class="pull-right">
        <a href="{{ route('graficos.principal') }}" class="btn btn-primary"><i class="material-icons">arrow_back</i><br>Atras</a>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

<div class="form-row">
  <div class="col-xs-12 col-sm-12 col-md-12">
      <form action="{{ route('graficos.academico',$academico->id) }}" method="GET">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="pull-right" style="margin-top: 8px">
              <h5>Año a graficar :</h5>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <select name="año" class="form-control">
            <option value="">TODOS LOS AÑOS</option>
            @foreach($procesos as $proceso)
               <option value='{{$proceso->año}}' @if($proceso->año==$año) selected @endif>{{$proceso->año}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
          <button type="submit" class="btn btn-success">Filtrar</button>
        </div>
    </form>
  </div>
</div>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Porcentaje de tiempo'],
          ['1.Actividades de Docencia', {{$grafcircular->act1}}],
          ['2.Actividades de Investigación', {{$grafcircular->act2}}],
          ['3.Extensión y Vinculación', {{$grafcircular->act3}}],
          ['4.Administración Académica', {{$grafcircular->act4}}],
          ['5.Otras Actividades Realizadas', {{$grafcircular->act5}}]
        ]);
        var options = {
          title: 'Distribución de tiempo de {{$academico->Nombres}} {{$academico->ApellidoPaterno}} {{$academico->ApellidoMaterno}} @if ($año ?? '') durante {{$año}} @else historico @endif',
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['bar']});
        google.charts.setOnLoadCallback(drawChart2);
        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
              ["Año", "Nota Obtenida", { role: "style" } ],
              @foreach($evaluaciones as $evaluacion)
                ["{{$evaluacion->año}}", {{$evaluacion->NotaFinal}}, "blue"],
              @endforeach
              ]);
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
          var options = {
              title: "Historial de notas de {{$academico->Nombres}} {{$academico->ApellidoPaterno}} {{$academico->ApellidoMaterno}}",
              width: 550,
              height: 400,
              bar: {groupWidth: "95%"},
              legend: { position: "none" },
          };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>
  </head>
  <body>
    <hr>
    @if ($evaluaciones[0] ?? '')
      <div class="row">
        <div class="col-md-6">
          @if ($grafcircular->act1+$grafcircular->act2+$grafcircular->act3+$grafcircular->act4+$grafcircular->act5 != 0)
          <div id="piechart" style="width: 550px; height: 400px;"></div>
          @else
          <div class="alert alert-danger">
            <h4>No hay distribución para este periodo</h4>
          </div>
          @endif
        </div>
        <div class="col-md-6">
          <div id="columnchart_values" style="width: 550px; height: 400px;"></div>
        </div>
      </div>
    @else
      <div class="alert alert-danger">
        <h4>No existen evaluaciones para graficar</h4>
      </div>
    @endif
    <hr>
  </body>
</html>

@endsection
