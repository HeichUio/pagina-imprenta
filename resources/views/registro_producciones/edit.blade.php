<h1>Editar Registro de Producción</h1>

<form action="{{ route('registro_producciones.update', $registroProduccion->id_registro) }}" method="POST">
@csrf
@method('PUT')

<label>Detalle de Cotización:</label>
<select name="id_detalle" required>

@foreach($detalle_cotizaciones as $detalle)
    <option value="{{ $detalle->id_detalle }}"
        {{ $detalle->id_detalle == $registroProduccion->id_detalle ? 'selected' : '' }}>
        Producto: {{ $detalle->producto->nombre_p }}
        | Cantidad: {{ $detalle->cantidad }}
        | Venta: ${{ $detalle->subtotal }}
    </option>
@endforeach

</select>
<br><br>

<label>Costo de Producción:</label>
<input type="number" name="costo_produccion"
       value="{{ $registroProduccion->costo_produccion }}" required>
<br><br>

<label>Observaciones:</label>
<input type="text" name="observaciones"
       value="{{ $registroProduccion->observaciones }}" required>
<br><br>

<label>Fecha de salida:</label>
<input type="date" name="fecha_salida"
       value="{{ $registroProduccion->fecha_salida }}" required>
<br><br>

<button type="submit">Actualizar</button>

</form>

<a href="{{ route('registro_producciones.index') }}">
    <button>← Volver a Registro Producción</button>
</a>