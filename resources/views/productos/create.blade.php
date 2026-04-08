@extends('layouts.admin')

@section('content')

<h1>Registrar Producto</h1>

<div class="form-box">
<form action="{{ route('productos.store') }}" method="POST">
@csrf

<input type="text" name="nombre_p" placeholder="Nombre">
<input type="text" name="descripcion_p" placeholder="Descripción">
<input type="text" name="unidad_m" placeholder="Unidad">

<input type="number" step="0.01" name="costo_unitario" placeholder="Costo">
<input type="number" step="0.01" name="precio_venta" placeholder="Precio">
<input type="number" name="cantidad_disponible" placeholder="Cantidad">

<input type="date" name="fecha_entrada">

<select name="id_proveedor">
@foreach($proveedores as $proveedor)
<option value="{{ $proveedor->id_proveedor }}">
{{ $proveedor->nombre_prov }}
</option>
@endforeach
</select>

<button class="btn">Guardar</button>

<a href="{{ route('productos.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection