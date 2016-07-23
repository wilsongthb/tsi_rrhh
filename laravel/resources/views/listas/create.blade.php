@extends("pagina")
@section("body")
<div class="container">
    <h1>AGREGAR A LISTA DE {{ strtoupper($pagina) }}</h1>
    <form method="POST" action="/lista{{ $pagina }}/crear">
        {{ csrf_field() }}
        <input name="monto" placeholder="Monto">
        <select name="moneda_id">
        @foreach($monedas as $moneda)
            <option value="{{ $moneda->id }}">{{ $moneda->abreviatura }} {{ $moneda->descripcion }}</option>
        @endforeach
        </select>
        <select name="{{ $pagina }}_id">
        @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->abreviatura }} {{ $item->descripcion }}</option>
        @endforeach
        </select>
        @if(isset($id_perfil))
            <input name="perfilpago_id" value="{{ $id_perfil }}" type="hidden">
        @else
            <select name="perfilpago_id">
            @foreach($perfilpagos as $perfilpago)
                <option value="{{ $perfilpago->id }}">{{ $perfilpago->nombre }}</option>
            @endforeach
            </select>
        @endif
        <input type="submit" value="Agregar">
    </form>
</div>
@stop