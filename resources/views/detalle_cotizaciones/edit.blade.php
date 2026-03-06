<h1> Editar cotizacion</h1>


<form action="{{ route('detalle_cotizaciones.update', $detalle_cotizacion) }}" method="POST">
    @csrf
    @method('PUT')

    
    <label>Cotización:</label><br>
    <select name="id_cotizacion" required>
        <option value="">Seleccione una cotización</option>

        @foreach($cotizaciones as $cotizacion)
            <option value="{{ $cotizacion->id_cotizacion }}"
                {{ $cotizacion->id_cotizacion == $detalle_cotizacion->id_cotizacion ? 'selected' : '' }}>
                Cotización #{{ $cotizacion->id_cotizacion }} -
                {{ $cotizacion->usuario->nombre_u }}
            </option>
        @endforeach
    </select><br><br>


    
    <label>Producto:</label><br>
    <select name="id_producto" required>
        <option value="">Seleccione un producto</option>

        @foreach($productos as $producto)
            <option value="{{ $producto->id_producto }}"
                {{ $producto->id_producto == $detalle_cotizacion->id_producto ? 'selected' : '' }}>
                {{ $producto->nombre_p }}
            </option>
        @endforeach
    </select><br><br>



    <label>Descripción:</label><br>
    <input type="text" name="descripcion_cot"
        value="{{ $detalle_cotizacion->descripcion_cot }}"><br><br>

    <label>Cantidad:</label><br>
    <input type="number" step="0.01" id="cantidad" name="cantidad"
    value="{{ $detalle_cotizacion->cantidad }}"><br><br>


    <label>Precio unitario:</label><br>
    <input type="number" step="0.01" id="precio" name="precio_unitario"
    value="{{ $detalle_cotizacion->precio_unitario }}"><br><br>


    <label>Subtotal:</label><br>
    <input type="number" step="0.01" id="subtotal" name="subtotal"
    value="{{ $detalle_cotizacion->subtotal }}" readonly><br><br>



    <button type="submit">Actualizar</button>
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