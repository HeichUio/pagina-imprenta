<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Proveedor</title>
</head>
<body>

<h1>Registrar Proveedor</h1>

<form action="{{ route('proveedores.store') }}" method="POST">
    @csrf

    <label>Nombre:</label><br>
    <input type="text" name="nombre_prov" placeholder="nombre"><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono_prov" placeholder="Telefono"><br>

    <label>Correo:</label><br>
    <input type="email" name="correo_pro" placeholder="gmail"><br>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('proveedores.index') }}">
    <button>← Volver a Proveedores</button>
</a>

</body>
</html>
