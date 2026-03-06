<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva cotización</title>
</head>
<body>

<h1>Registrar Detalle de Cotización</h1>

<form action="{{ route('detalle_cotizaciones.store') }}" method="POST">
    @csrf


    <label>Cotización / Cliente:</label><br>
    <select name="id_cotizacion" required>
        <option value="">Seleccione</option>

        @foreach($cotizaciones as $cotizacion)
            <option value="{{ $cotizacion->id_cotizacion }}">
                Cotización #{{ $cotizacion->id_cotizacion }}
                - {{ $cotizacion->usuario->nombre_u }}
            </option>
        @endforeach
    </select><br><br>


    
    <label>Producto:</label><br>
    <select name="id_producto" required>
        <option value="">Seleccione</option>

        @foreach($productos as $producto)
            <option value="{{ $producto->id_producto }}">
                {{ $producto->nombre_p }}
            </option>
        @endforeach
    </select><br><br>



    <label>Descripción:</label><br>
    <input type="text" name="descripcion_cot" required><br><br>


    
    <label>Cantidad:</label><br>
    <input type="number" id="cantidad" name="cantidad" step="1" required><br><br>


    
    <label>Precio unitario:</label><br>
    <input type="number" id="precio" name="precio_unitario" step="0.01" required><br><br>


    
    <label>Subtotal:</label><br>
    <input type="number" id="subtotal" name="subtotal" step="0.01" readonly><br><br>

    <button type="submit">Guardar</button>
</form>
<script>
    
function calcularSubtotal() {
    let cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
    let precio   = parseFloat(document.getElementById('precio').value) || 0;

    let subtotal = cantidad * precio;

    document.getElementById('subtotal').value = subtotal.toFixed(2);
}

document.getElementById('cantidad').addEventListener('input', calcularSubtotal);
document.getElementById('precio').addEventListener('input', calcularSubtotal);
</script>


<a href="{{ route('detalle_cotizaciones.index') }}">
    <button>← Volver a Detalle Cotizaciones</button>
</a>

</body>
</html>
