<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cotizaciones</title>
</head>
<body>

<h1>Lista de cotizaciones</h1>

@if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('cotizaciones.create') }}">
    <button type="button">Nueva cotizacion</button>
</a>
<a href="{{ route('detalle_cotizaciones.store') }}">
    <button type="button">detalles</button>
</a>
<a href="{{ route('admin.inicio') }}">
    <button>← Volver al Inicio</button>
</a>

<hr>

<hr>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Creacion</th>
        <th>Vigencia</th>
        <th>Total</th>
        <th>Estado</th>
        <th>Cliente</th>
        <th>Acciones</th>
    </tr>

    @forelse ($cotizaciones as $cotizacion)
        <tr>
            <td>{{ $cotizacion->id_cotizacion }}</td>
            <td>{{ $cotizacion->fecha_creacion }}</td>
            <td>{{ $cotizacion->fecha_vigencia }}</td>
            <td>{{ $cotizacion->total_estimado}}</td>
            <td>{{ $cotizacion->estado_c }}</td>
            <td>{{ $cotizacion->usuario->nombre_u ?? 'Sin cliente' }}</td>

            <td>
                <a href="{{ route('cotizaciones.edit', $cotizacion) }}">
                    <button type="button">Editar</button>
                </a>

                <form action="{{ route('cotizaciones.destroy', $cotizacion) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Seguro que deseas eliminar esta cotizacion?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="10">No hay clientes  registrados.</td>
        </tr>
    @endforelse

</table>

</body>
</html>
