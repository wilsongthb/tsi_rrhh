@extends("pagina")
@section("body")
<div class="container">
    <h1>EDITAR DE LISTA DE {{ strtoupper($pagina) }}</h1>
    <form method="POST">
        {{ csrf_field() }}
        <input name="monto" placeholder="Monto" value="{{ $lista['monto'] }}">
        <select name="moneda_id">
        @foreach($monedas as $moneda)
            @if($lista["moneda_id"] == $moneda->id)
            <option value="{{ $moneda->id }}" selected>{{ $moneda->abreviatura }} {{ $moneda->descripcion }}</option>
            @else
            <option value="{{ $moneda->id }}">{{ $moneda->abreviatura }} {{ $moneda->descripcion }}</option>
            @endif
        @endforeach
        </select>
        <select name="{{ $pagina }}_id">
        @foreach($items as $item)
            @if($lista["item_id"] == $item->id)
            <option value="{{ $item->id }}" selected>{{ $item->abreviatura }} {{ $item->descripcion }}</option>
            @else
            <option value="{{ $item->id }}">{{ $item->abreviatura }} {{ $item->descripcion }}</option>
            @endif
        @endforeach
        </select>
        <select name="perfilpago_id">
        @foreach($perfilpagos as $perfilpago)
            @if($lista["perfilpago_id"] == $perfilpago->id)
            <option value="{{ $perfilpago->id }}" selected>{{ $perfilpago->nombre }}</option>
            @else
            <option value="{{ $perfilpago->id }}">{{ $perfilpago->nombre }}</option>
            @endif
        @endforeach
        </select>
        <input type="submit" value="Actualizar">
    </form>
</div>
@stop