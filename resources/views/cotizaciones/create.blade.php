<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva cotizacion</title>
</head>
<body>

<h1>Registrar Cotizacion</h1>

<form action="{{ route('cotizaciones.store') }}" method="POST">
    @csrf

    <label>Fecha de pedido:</label><br>
    <input type="date" name="fecha_creacion" required><br><br>

    <label>Fecha de Vigencia:</label><br>
    <input type="date" name="fecha_vigencia" required><br><br>

    <label>total estimado:</label><br>
    <input type="number"  step="0.01" name="total_estimado" required><br><br>

    <label>Estado</label><br>
    <input type="text"  name="estado_c" required><br><br>

    <label>Cliente:</label><br>
    <select name="id_usuario" required>
        <option value="">Seleccione el cliente</option>

        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id_usuario }}">
                {{ $usuario->nombre_u}}
            </option>
        @endforeach

    </select><br><br>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('cotizaciones.index') }}">
    <button>← Volver a Cotizaciones</button>
</a>

</body>
</html>
