<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <title>Pauta Evaluacion UCM</title>


        <style>
            html {
                min-height: 100%;
                position: relative;
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
