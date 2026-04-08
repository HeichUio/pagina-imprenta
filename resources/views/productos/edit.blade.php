@extends('layouts.admin')

@section('content')

<h1>Editar Producto</h1>

<div class="form-box">
<form action="{{ route('productos.update', $producto) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nombre_p" value="{{ $producto->nombre_p }}">
<input type="text" name="descripcion_p" value="{{ $producto->descripcion_p }}">
<input type="text" name="unidad_m" value="{{ $producto->unidad_m }}">

<input type="number" name="costo_unitario" value="{{ $producto->costo_unitario }}">
<input type="number" name="precio_venta" value="{{ $producto->precio_venta }}">
<input type="number" name="cantidad_disponible" value="{{ $producto->cantidad_disponible }}">

<input type="date" name="fecha_entrada" value="{{ $producto->fecha_entrada }}">

<select name="id_proveedor">
@foreach($proveedores as $proveedor)
<option value="{{ $proveedor->id_proveedor }}"
{{ $producto->id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>
{{ $proveedor->nombre_prov }}
</option>
@endforeach
</select>

<button class="btn">Actualizar</button>

<a href="{{ route('productos.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection