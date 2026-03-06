<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proveedores</title>
</head>
<body>

<h1>Lista de Proveedores</h1>

<a href="{{ route('proveedores.create') }}">
    <button>Nuevo proveedor</button>
</a>
<a href="{{ route('admin.inicio') }}">
    <button>← Volver al Inicio</button>
</a>

<hr>

<hr>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Acciones</th>
    </tr>

    @foreach ($proveedores as $proveedor)
        <tr>
            <td>{{ $proveedor->id_proveedor }}</td>
            <td>{{ $proveedor->nombre_prov }}</td>
            <td>{{ $proveedor->telefono_prov }}</td>
            <td>{{ $proveedor->correo_pro }}</td>
            <td>
           <a href="{{ route('proveedores.edit', $proveedor) }}">
            <button type="button">Editar</button>
           </a>

        <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</td>
        </tr>
    @endforeach

</table>

</body>
</html>
