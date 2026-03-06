<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de entradas de productos</title>
</head>
<body>

<h1>Lista de entrada de productos</h1>

@if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('entradainventarios.create') }}">
    <button type="button">Registrar entrada</button>
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
        <th>Cantidad</th>
        <th>Costo unitario</th>
        <th>Observaciones</th>
        <th>Fecha entrada</th>
        <th>Acciones</th>
    </tr>

    @forelse ($entradainventarios as $entradainventario)
        <tr>
            <td>{{ $entradainventario->id_entrada }}</td>

            <td>{{ $entradainventario->producto->nombre_p ?? 'Sin producto' }}</td>

            <td>{{ $entradainventario->cantidad }}</td>

            <td>${{ number_format($entradainventario->costo_unitario, 2) }}</td>

            <td>{{ $entradainventario->observaciones }}</td>

            <td>{{ $entradainventario->fecha_entrada }}</td>

            <td>
                <a href="{{ route('entradainventarios.edit', $entradainventario->id_entrada) }}">
                    <button type="button">Editar</button>
                </a>

                <form action="{{ route('entradainventarios.destroy', $entradainventario->id_entrada) }}"
                      method="POST"
                      style="display:inline;"
                      onsubmit="return confirm('¿Seguro que deseas eliminar esta entrada?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">No hay registros.</td>
        </tr>
    @endforelse

</table>

</body>
</html>