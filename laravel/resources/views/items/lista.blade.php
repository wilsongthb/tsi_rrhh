<a href="/{{ $pagina }}/crear"><button class="btn btn-default">Crear</button></a>
<hr>
<table class="table">
    <tr>
        <td>ID</td>
        <td>Descripcion</td>
        <td>Abreviatura</td>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->descripcion }}</td>
        <td>{{ $item->abreviatura }}</td>
        <td><a href="/{{ $pagina }}/editar/{{ $item->id }}"><button class="btn btn-warning">Editar</button></a></td>
        <td><button class="btn btn-danger" onclick="eliminar({{ $item->id }})">Eliminar</button></td>
    </tr>
    @endforeach
</table>
<a href="" id="eliminar"></a>
<script>
function eliminar(id){
    if(confirm("Eliminar " + id)){
        str_get = "/{{ $pagina }}/eliminar/" + id;
        var el = document.getElementById("eliminar");
        el.href = str_get;
        el.click();
    }
}
</script>