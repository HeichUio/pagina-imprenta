<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de cotizaciones</title>
</head>
<body>

<h1>Lista de detalles de cotización</h1>

@if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('detalle_cotizaciones.create') }}">
    <button type="button">Nueva cotización</button>
</a>

<a href="{{ route('usuarios.create') }}">
    <button type="button">Registar usuario </button>
</a>
<a href="{{ route('admin.inicio') }}">
    <button>← Volver al Inicio</button>
</a>

<hr>
<hr>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Producto</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Subtotal</th>
        <th>Acciones</th>
    </tr>

    @forelse ($detalle_cotizaciones as $detalle_cotizacion)
        <tr>
        
            <td>{{ $detalle_cotizacion->id_detalle }}</td>

            <td>
                {{ optional($detalle_cotizacion->cotizacion->usuario)->nombre_u }}
            </td>

            <td>{{ $detalle_cotizacion->producto->nombre_p }}</td>

            <td>{{ $detalle_cotizacion->descripcion_cot }}</td>
            <td>{{ $detalle_cotizacion->cantidad }}</td>
            <td>{{ $detalle_cotizacion->precio_unitario }}</td>
            <td>{{ $detalle_cotizacion->subtotal }}</td>
            
            <td>
                <a href="{{ route('detalle_cotizaciones.edit', $detalle_cotizacion->id_detalle) }}">
                    <button type="button">Editar</button>
                </a>

                <form action="{{ route('detalle_cotizaciones.destroy', $detalle_cotizacion->id_detalle) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Seguro que deseas eliminar esta cotización?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8">No hay registros.</td>
        </tr>
    @endforelse

</table>

</body>
</html>
