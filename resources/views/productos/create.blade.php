<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
</head>
<body>

<h1>Registrar Producto</h1>

<form action="{{ route('productos.store') }}" method="POST">
    @csrf

    <label>Nombre:</label><br>
    <input type="text" name="nombre_p" required><br><br>

    <label>Descripción:</label><br>
    <input type="text" name="descripcion_p" required><br><br>

    <label>Unidad de medida:</label><br>
    <input type="text" name="unidad_m" required><br><br>

    <label>Costo unitario:</label><br>
    <input type="number" step="0.01" name="costo_unitario" required><br><br>

    <label>Precio de venta:</label><br>
    <input type="number" step="0.01" name="precio_venta" required><br><br>

    <label>Cantidad disponible:</label><br>
    <input type="number" name="cantidad_disponible" required><br><br>

    <label>Fecha de entrada:</label><br>
    <input type="date" name="fecha_entrada" required><br><br>

    <label>Proveedor:</label><br>
    <select name="id_proveedor" required>
        <option value="">Seleccione proveedor</option>

        @foreach($proveedores as $proveedor)
            <option value="{{ $proveedor->id_proveedor }}">
                {{ $proveedor->nombre_prov}}
            </option>
        @endforeach

    </select><br><br>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('productos.index') }}">
    <button>← Volver a Productos</button>
</a>

</body>
</html>
