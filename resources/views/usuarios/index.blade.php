<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
</head>
<body>

<h1>Lista de Usuarios</h1>

@if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('usuarios.create') }}">
    <button type="button">Nuevo Usuario</button>
</a>
<a href="{{ route('detalle_cotizaciones.store') }}">
    <button type="button">Cotizaciones</button>
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
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Código Postal</th>
        <th>Tipo de Usuario</th>
        <th>Acciones</th>
    </tr>

    @forelse ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id_usuarios }}</td>
            <td>{{ $usuario->nombre_u }}</td>
            <td>{{ $usuario->telefono_u }}</td>
            <td>{{ $usuario->correo_u }}</td>
            <td>{{ $usuario->codigo_postal }}</td>
            <td>{{ $usuario->role }}</td>
            <td>
                <a href="{{ route('usuarios.edit', $usuario) }}">
                    <button type="button">Editar</button>
                </a>

                <form action="{{ route('usuarios.destroy', $usuario) }}" 
                      method="POST" 
                      style="display:inline;"
                      onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">No hay usuarios registrados.</td>
        </tr>
    @endforelse

</table>

</body>
</html>