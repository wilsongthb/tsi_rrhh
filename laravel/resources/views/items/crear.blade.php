@extends("pagina")
@section("body")
<div class="container">
    <h1>CREAR</h1>
    <hr>
    <form method="POST">
        {{ csrf_field() }}
        <input name="descripcion" placeholder="Descripcion">
        <input name="abreviatura" placeholder="Abreviatura">
        <input type="submit" value="Crear">
    </form>
</div>
@stop