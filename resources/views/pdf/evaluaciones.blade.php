@extends('pdf.layout')

@section('content')
  <h1>ID de la Evaluacion: {{ $evaluacion->id }}</h1>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CodigoComision:</strong> {{ $evaluacion->CodigoComision }}
            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>RUT del Academico:</strong> {{ $evaluacion->RUTAcademico }}
            </div>
        </div>
        <br>
        <br>
        <br>
        <strong>Actividades realizadas:</strong>
        <br>

          1. Actividades de docencia  :
                  {{ $evaluacion->p1 }} %
                  Nota:{{ $evaluacion->n1 }}
          <br>
          2. Actividades de Investigacion  :
                  {{ $evaluacion->p2 }} %
                  Nota:{{ $evaluacion->n2 }}
          <br>
          3. Extension y Vinculacion  :
                  {{ $evaluacion->p3 }} %
                  Nota:{{ $evaluacion->n3 }}
          <br>
          4. Administracion Academica  :
                  {{ $evaluacion->p4 }} %
                  Nota:{{ $evaluacion->n4 }}
          <br>
          5. Otras actividades realizadas  :
                  {{ $evaluacion->p5 }} %
                  Nota:{{ $evaluacion->n5 }}
          <br>
          <br>
          <br>


            <br><strong>Nota Final Obtenida:</strong>
            {{ $evaluacion->NotaFinal }}

            <br>
            <br>
            <br>

            <strong>Argumento:</strong>
            {{ $evaluacion->Argumento }}
        </div>
@endsection
