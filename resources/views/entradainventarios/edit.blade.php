<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar entrada de producto</title>
</head>
<body>

<h1>Editar entrada de producto</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('entradainventarios.update', $entradainventario->id_entrada) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Producto:</label>
    <select name="id_producto">
        @foreach ($productos as $producto)
            <option value="{{ $producto->id_producto }}"
                {{ $producto->id_producto == $entradainventario->id_producto ? 'selected' : '' }}>
                {{ $producto->nombre_p }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Cantidad:</label>
    <input type="number" name="cantidad" value="{{ $entradainventario->cantidad }}" required>
    <br><br>

    <label>Costo unitario:</label>
    <input type="number" step="0.01" name="costo_unitario" value="{{ $entradainventario->costo_unitario }}" required>
    <br><br>

    <label>Observaciones:</label>
    <textarea name="observaciones">{{ $entradainventario->observaciones }}</textarea>
    <br><br>

    <label>Fecha entrada:</label>
    <input type="date" name="fecha_entrada" value="{{ $entradainventario->fecha_entrada }}" required>
    <br><br>

    <button type="submit">Actualizar</button>
</form>

<br>

<a href="{{ route('entradainventarios.index') }}">
    <button type="button">← Volver a Entradas</button>
</a>

</body>
</html>