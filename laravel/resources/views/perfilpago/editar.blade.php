@extends("pagina")
@section("body")
<div class="container">
    <h1>EDITAR PERFIL DE PAGO</h1>
    <hr>
    <form method="POST">
        {{ csrf_field() }}
        <input name="id" placeholder="ID" value="{{ $perfilpago->id }}" disabled="">
        <input name="nombre" placeholder="Nombre" value="{{ $perfilpago->nombre }}">
        <label>Descripcion:</label>
        <textarea name="descripcion">{{ $perfilpago->descripcion }}</textarea>
        <select name="estado_id">
            @foreach($estados as $estado)
                @if($estado->id == $perfilpago->estado_id)
                    <option value="{{ $estado->id }}" selected="">{{ $estado->descripcion }}</option>
                @else
                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                @endif
            @endforeach
        </select>
        <input type="submit" value="Actualizar">
    </form>
    <hr>
    <label>Lista ingresos</label>
    <br>
    <a href="/listaingresos/crear/{{ $perfilpago->id }}"><button>Agregar</button></a>
    <table>
        <tr>
            <td>ID</td>
            <td>Moneda</td>
            <td>Monto</td>
            <td>Ingreso</td>
        </tr>
        @foreach($listaingreso as $ingreso)
        <tr>
            <td>{{ $ingreso["id"] }}</td>
            <td>{{ $ingreso["moneda"] }}</td>
            <td>{{ $ingreso["monto"] }}</td>
            <td>{{ $ingreso["ingreso"] }}</td>
            <td><a href="/listaingresos/editar/{{ $ingreso['id'] }}"><button>Editar</button></a></td>
            <td><a href="/listaingresos/eliminar/{{ $ingreso['id'] }}"><button>Eliminar</button></a></td>
        </tr>
        @endforeach
    </table>
    <hr>
    <label>Lista descuentos</label>
    <br>
    <a href="/listadescuentos/crear/{{ $perfilpago->id }}"><button>Agregar</button></a>
    <table>
        <tr>
            <td>ID</td>
            <td>Moneda</td>
            <td>Monto</td>
            <td>descuento</td>
        </tr>
        @foreach($listadescuento as $descuento)
        <tr>
            <td>{{ $descuento["id"] }}</td>
            <td>{{ $descuento["moneda"] }}</td>
            <td>{{ $descuento["monto"] }}</td>
            <td>{{ $descuento["descuento"] }}</td>
            <td><a href="/listadescuentos/editar/{{ $descuento['id'] }}"><button>Editar</button></a></td>
            <td><a href="/listadescuentos/eliminar/{{ $descuento['id'] }}"><button>Eliminar</button></a></td>
        </tr>
        @endforeach
    </table>
    <hr>
    <label>Lista aportes</label>
    <br>
    <a href="/listaaportes/crear/{{ $perfilpago->id }}"><button>Agregar</button></a>
    <table>
        <tr>
            <td>ID</td>
            <td>Moneda</td>
            <td>Monto</td>
            <td>aporte</td>
        </tr>
        @foreach($listaaporte as $aporte)
        <tr>
            <td>{{ $aporte["id"] }}</td>
            <td>{{ $aporte["moneda"] }}</td>
            <td>{{ $aporte["monto"] }}</td>
            <td>{{ $aporte["aporte"] }}</td>
            <td><a href="/listaaportes/editar/{{ $aporte['id'] }}"><button>Editar</button></a></td>
            <td><a href="/listaaportes/eliminar/{{ $aporte['id'] }}"><button>Eliminar</button></a></td>
        </tr>
        @endforeach
    </table>
    <hr>
</div>
@stop