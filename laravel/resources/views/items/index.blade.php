@extends("pagina")

@section("body")
<div class="container">
    <h1>LISTADO DE {{ strtoupper($pagina) }}</h1>
    @include("items.lista")
@stop