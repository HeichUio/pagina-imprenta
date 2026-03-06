<h1>Registrar Producción</h1>

<form action="{{ route('registro_producciones.store') }}" method="POST">
@csrf

<label>Detalle de Cotización:</label>
<select name="id_detalle" required>
    <option value="">Seleccione</option>

    @foreach($detalle_cotizaciones as $detalle)
        <option value="{{ $detalle->id_detalle }}">
            Producto: {{ $detalle->producto->nombre_p }}
            | Cantidad: {{ $detalle->cantidad }}
            | Venta: ${{ $detalle->subtotal }}
        </option>
    @endforeach
</select>
<br><br>

<label>Costo de Producción:</label>
<input type="number" name="costo_produccion" required>
<br><br>

<label>Observaciones:</label>
<input type="text" name="observaciones" required>
<br><br>

<label>Fecha de salida:</label>
<input type="date" name="fecha_salida" required>
<br><br>

<button type="submit">Guardar</button>

</form>
 
<a href="{{ route('registro_producciones.index') }}">
    <button>← Volver a Registro Producción</button>
</a>