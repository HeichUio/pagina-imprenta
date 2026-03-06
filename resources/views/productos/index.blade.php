<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>

<h1>Lista de productos</h1>

@if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('productos.create') }}">
    <button type="button">Nuevo producto</button>
</a>
<a href="{{ route('admin.inicio') }}">
    <button>← Volver al Inicio</button>
</a>

<hr>

<hr>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Unidad de medida</th>
        <th>Costo unitario</th>
        <th>Precio venta</th>
        <th>Cantidad disponible</th>
        <th>Fecha entrada</th>
        <th>Proveedor</th>
        <th>Acciones</th>
    </tr>

    @forelse ($productos as $producto)
        <tr>
            <td>{{ $producto->id_producto }}</td>
            <td>{{ $producto->nombre_p }}</td>
            <td>{{ $producto->descripcion_p }}</td>
            <td>{{ $producto->unidad_m }}</td>
            <td>{{ $producto->costo_unitario }}</td>
            <td>{{ $producto->precio_venta }}</td>
            <td>{{ $producto->cantidad_disponible }}</td>
            <td>{{ $producto->fecha_entrada }}</td>
            <td>{{ $producto->proveedor->nombre_prov ?? 'Sin proveedor' }}</td>

            <td>
                <a href="{{ route('productos.edit', $producto) }}">
                    <button type="button">Editar</button>
                </a>

                <form action="{{ route('productos.destroy', $producto) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="10">No hay productos registrados.</td>
        </tr>
    @endforelse

</table>

</body>
</html>
