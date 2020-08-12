@extends('layouts.app')

<title>Graficos UCM</title>

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gráficos Facultad/Dpto</li>
  </ol>
</nav>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="pull-left">
      <h2>Gráficos @if ($dpto ?? '') {{ $dpto->Nombre }} @else {{ $facultad->Nombre }} @endif </h2>
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
      <form action="{{ route('graficos.principal') }}" method="GET">
          <div class="col-xs-4 col-sm-4 col-md-4">
            <h5>Año</h5>
            <select name="año" class="form-control">
              @foreach($procesos as $proceso)
                 <option value='{{$proceso->año}}' @if($proceso->año==$año) selected @endif>{{$proceso->año}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xs-7 col-sm-7 col-md-7">
            <h5>Departamento</h5>
            <select name="departamento" class="form-control">
              <option value="">TODOS LOS DEPARTAMENTOS</option>
              @foreach($departamentos as $departamento)
                 <option value='{{$departamento->id}}' @if(($dpto ?? '') && ($departamento==$dpto)) selected @endif>{{$departamento->Nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xs-1 col-sm-1 col-md-1" style="margin-top: 5px">
              <br><button type="submit" class="btn btn-success">Filtrar</button>
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
          title: 'Distribución de tiempo de los académicos de @if ($dpto ?? '') el {{ $dpto->Nombre }} @else la {{ $facultad->Nombre }} @endif hacia cada actividad durante el {{$año}}',
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
              ["Academico", "Nota Obtenida", { role: "style" } ],
              @foreach($evaluaciones as $evaluacion)
                ["{{$evaluacion->Nombres}} {{$evaluacion->ApellidoPaterno}} {{$evaluacion->ApellidoMaterno}}", {{$evaluacion->NotaFinal}}, "blue"],
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
              title: "Notas Finales de los academicos de @if ($dpto ?? '') el {{ $dpto->Nombre }} @else la {{ $facultad->Nombre }} @endif durante el {{ $año }}",
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
          <div id="piechart" style="width: 550px; height: 400px;"></div>
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

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <button class="btn btn-link" style="color:black" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <h5>Académicos @if ($dpto ?? '') {{ $dpto->Nombre }} @else {{ $facultad->Nombre }} @endif</h5>
      </button>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <table class="table table-bordered table-sm" style="margin-top: 8px">
          <tr>
            <th>RUT</th>
            <th>Académico</th>
            <th>Título Profesional</th>
            <th>Departamento</th>
          </tr>
          @foreach ($academicos as $academico)
            <tr>
              <td>{{ $academico->id }} - {{ $academico->verificador }}</td>
              <td>{{ $academico->Nombres }} {{ $academico->ApellidoPaterno }} {{ $academico->ApellidoMaterno }}</td>
              <td>{{ $academico->TituloProfesional }}</td>
              <td>{{ $academico->departamento->Nombre }}</td>
              <td width="100px">
                  <a href="{{ route('graficos.academico', $academico->id) }}" class="btn btn-success">Seleccionar</a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
