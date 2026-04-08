@extends('layouts.admin')

@section('content')

<h1>Registrar Detalle de Cotización</h1>

<div class="form-box">
<form action="{{ route('detalle_cotizaciones.store') }}" method="POST">
@csrf

<select name="id_cotizacion">
@foreach($cotizaciones as $cotizacion)
<option value="{{ $cotizacion->id_cotizacion }}">
Cotización #{{ $cotizacion->id_cotizacion }} - {{ $cotizacion->usuario->nombre_u }}
</option>
@endforeach
</select>

<select name="id_producto">
@foreach($productos as $producto)
<option value="{{ $producto->id_producto }}">
{{ $producto->nombre_p }}
</option>
@endforeach
</select>

<input type="text" name="descripcion_cot" placeholder="Descripción">
<input type="number" id="cantidad" name="cantidad">
<input type="number" id="precio" name="precio_unitario">
<input type="number" id="subtotal" name="subtotal" readonly>

<button class="btn">Guardar</button>

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