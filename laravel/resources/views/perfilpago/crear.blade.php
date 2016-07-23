@extends("pagina")
@section("body")
<div class="container">
    <h1>CREAR PERFIL DE PAGO</h1>
    <hr>
    <form method="POST">
        {{ csrf_field() }}
        <input name="nombre" placeholder="Nombre">
        <label>Descripcion:</label>
        <textarea name="descripcion"></textarea>
        <select name="estado_id">
            @foreach($estados as $estado)
            <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
            @endforeach
        </select>
        <input type="submit" value="Crear">
    </form>
</div>
@stop