@extends('layouts.admin')

@section('content')

<h1>Editar Entrada</h1>

<div class="form-box">
<form action="{{ route('entradainventarios.update', $entradainventario->id_entrada) }}" method="POST">
@csrf
@method('PUT')

<select name="id_producto">
@foreach ($productos as $producto)
<option value="{{ $producto->id_producto }}"
{{ $producto->id_producto == $entradainventario->id_producto ? 'selected' : '' }}>
{{ $producto->nombre_p }}
</option>
@endforeach
</select>

<input type="number" name="cantidad" value="{{ $entradainventario->cantidad }}">
<input type="number" step="0.01" name="costo_unitario" value="{{ $entradainventario->costo_unitario }}">
<input type="text" name="observaciones" value="{{ $entradainventario->observaciones }}">
<input type="date" name="fecha_entrada" value="{{ $entradainventario->fecha_entrada }}">

<button class="btn">Actualizar</button>

<a href="{{ route('entradainventarios.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection