<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class NotasTodosAño extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    use App\Charts\SampleChart;


  // Instanciamos el objeto gráfico
  $chart = new SampleChart();

  // Añadimos las etiquetas del eje X
  $chart->labels(['One', 'Two', 'Three']);

  $chart->dataset('My dataset 1', 'line', [1, 2, 3, 4]);
  $chart->dataset('My dataset 2', 'line', collect([3, 4, 5, 6]));

}
