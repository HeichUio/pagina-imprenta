@extends('layouts.admin')

@section('content')

<h1>Editar Detalle</h1>

<div class="form-box">
<form action="{{ route('detalle_cotizaciones.update', $detalle_cotizacion) }}" method="POST">
@csrf
@method('PUT')

<select name="id_cotizacion">
@foreach($cotizaciones as $cotizacion)
<option value="{{ $cotizacion->id_cotizacion }}"
{{ $cotizacion->id_cotizacion == $detalle_cotizacion->id_cotizacion ? 'selected' : '' }}>
{{ $cotizacion->usuario->nombre_u }}
</option>
@endforeach
</select>

<select name="id_producto">
@foreach($productos as $producto)
<option value="{{ $producto->id_producto }}"
{{ $producto->id_producto == $detalle_cotizacion->id_producto ? 'selected' : '' }}>
{{ $producto->nombre_p }}
</option>
@endforeach
</select>

<input type="text" name="descripcion_cot" value="{{ $detalle_cotizacion->descripcion_cot }}">
<input type="number" id="cantidad" name="cantidad" value="{{ $detalle_cotizacion->cantidad }}">
<input type="number" id="precio" name="precio_unitario" value="{{ $detalle_cotizacion->precio_unitario }}">
<input type="number" id="subtotal" name="subtotal" value="{{ $detalle_cotizacion->subtotal }}" readonly>

<button class="btn">Actualizar</button>

<a href="{{ route('detalle_cotizaciones.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

<script>
function calcularSubtotal() {
let c = parseFloat(document.getElementById('cantidad').value) || 0;
let p = parseFloat(document.getElementById('precio').value) || 0;
document.getElementById('subtotal').value = (c * p).toFixed(2);
}
cantidad.oninput = calcularSubtotal;
precio.oninput = calcularSubtotal;
</script>

@endsection