<h1>Registrar entrada de inventario</h1>

<form action="{{ route('entradainventarios.store') }}" method="POST">
@csrf

<label>Producto:</label>
<select name="id_producto" required>
@foreach($productos as $producto)
<option value="{{ $producto->id_producto }}">
{{ $producto->nombre_p }} ( {{ $producto->cantidad_disponible }})
</option>
@endforeach
</select>

<br><br>

<label>Cantidad que entra:</label>
<input type="number" name="cantidad" required>

<br><br>

<label>Costo unitario:</label>
<input type="number" step="0.01" name="costo_unitario">

<br><br>

<label>Fecha de entrada:</label>
<input type="date" name="fecha_entrada" required>

<br><br>

<label>Observaciones:</label>
<input type="text" name="observaciones">

<br><br>

<button type="submit">Registrar Entrada</button>
</form>
