@extends("pagina")
@section("body")
<div class="container">
    <h1>EDITAR</h1>
    <hr>
    <form action="{{ $item->id }}" method="POST">
        {{ csrf_field() }}
        <input value="{{ $item->id }}" name="id" disabled="">
        <input value="{{ $item->descripcion }}" name="descripcion">
        <input value="{{ $item->abreviatura }}" name="abreviatura">
        <input type="submit" value="Actualizar">
    </form>
</div>
@stop