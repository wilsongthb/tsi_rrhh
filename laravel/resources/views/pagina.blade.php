<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIS REMUNERACIONES</title>

        <meta name="description" content="Source code generated using layoutit.com">
        <meta name="author" content="LayoutIt!">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">SIS REMUNERACIONES</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="welcome">Bienvenida</a></li>
                <li><a href="monedas">Moneda</a></li>
                <li><a href="ingresos">Ingreso</a></li>
                <li><a href="descuentos">Descuentos</a></li>
                <li><a href="aportes">Aportes</a></li>
                <li><a href="perfilpago">Perfiles de Pago</a></li>
            </ul>
        </div>
    </nav>
</div>
<body>
@yield('body')

@section("script")
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/scripts.js"></script>
@show
</body>