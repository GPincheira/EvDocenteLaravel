
<!-- Templates necesario para la visualizacion de los graficos -->
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      // Esta funcion tomara los datos proporcionados por el controlador ChartController y TestController y los aplicara a la grafica
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Evaluaciones','Evaluaciones'],
          @foreach ($evaluacion as $evaluaciones)
          ['{{ $evaluaciones->RUTAcademico}}', {{ $evaluaciones->NotaFinal}}]
          @endforeach
        ]);

        var options = {
          title: 'Cantidad de articulos vinculados a una categoria.'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
