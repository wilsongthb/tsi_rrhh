@extends("pagina")
@section("body")
<div class="container">
<h1>PERFILES DE PAGO</h1>
<a href="/perfilpago/crear"><button class="btn btn-default">Crear</button></a>
<hr>
<table class="table">
    <tr>
        <td>ID</td>
        <td>Nombre</td>
        <td>Estado</td>
    </tr>
    @foreach($perfilpagos as $perfilpago)
    <tr>
        <td>{{ $perfilpago->id }}</td>
        <td>{{ $perfilpago->nombre}}</td>
        <td>
            @if($perfilpago->estado_id == 1)
                <span style="color:green">ACTIVO</span>
            @else
                <span style="color:red">INACTIVO</span>
            @endif
        </td>
        <td><a href="/perfilpago/editar/{{ $perfilpago->id }}"><button class="btn btn-warning">Editar</button></a></td>
    </tr>
    @endforeach
</table>
</div>
@stop