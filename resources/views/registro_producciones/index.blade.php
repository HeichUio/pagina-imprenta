<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de producción</title>
</head>
<body>

<h1>Lista de registros de producción</h1>

@if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('registro_producciones.create') }}">
    <button type="button">Nuevo registro</button>
</a>
<a href="{{ route('admin.inicio') }}">
    <button>← Volver al Inicio</button>
</a>

<hr>

<hr>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Producto</th>
    <th>Cantidad utilizada</th>
    <th>Costo producción</th>
    <th>Venta</th>
    <th>Ganancia</th>
    <th>Observaciones</th>
    <th>Fecha salida</th>
    <th>Acciones</th>
</tr>

@forelse ($registro_producciones as $registro)
<tr>
    <td>{{ $registro->id_registro }}</td>


    <td>
        {{ optional(optional($registro->detalle)->producto)->nombre_p ?? 'Sin producto' }}
    </td>

    
    <td>{{ $registro->cantidad_utilizada }}</td>

    <td>{{ $registro->costo_produccion }}</td>

    
    <td>{{ $registro->venta }}</td>

    
    <td>{{ $registro->ganancia }}</td>

    <td>{{ $registro->observaciones }}</td>

    <td>{{ $registro->fecha_salida }}</td>

    <td>
    
        <a href="{{ route('registro_producciones.edit', $registro->id_registro) }}">
            <button type="button">Editar</button>
        </a>


        <form action="{{ route('registro_producciones.destroy', $registro->id_registro) }}"
              method="POST"
              style="display:inline;"
              onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="9">No hay registros de producción</td>
</tr>
@endforelse

</table>

</body>
</html>
