<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <title>Pauta Evaluacion UCM</title>


        <style>
            table, th, td {
              border: 1px solid black;
            }
            th, td {
              padding: 1px;
              text-align: center;
            }
            .content{
              text-align: center;
            }
            .izq {
                text-align: left;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	@yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
