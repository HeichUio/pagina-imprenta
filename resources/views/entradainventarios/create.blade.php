@extends('layouts.admin')

@section('content')

<h1>Registrar Entrada de Inventario</h1>

<div class="form-box">
<form action="{{ route('entradainventarios.store') }}" method="POST">
@csrf

<label>Producto:</label>
<select name="id_producto" required>
    <option value="">Seleccione</option>
    @foreach($productos as $producto)
        <option value="{{ $producto->id_producto }}">
            {{ $producto->nombre_p }}
        </option>
    @endforeach
</select>

<label>Cantidad:</label>
<input type="number" name="cantidad" required>

<label>Costo Unitario:</label>
<input type="number" step="0.01" name="costo_unitario" required>

<label>Observaciones:</label>
<input type="text" name="observaciones">

<label>Fecha de Entrada:</label>
<input type="date" name="fecha_entrada" required>

<br><br>

<button class="btn btn-success">Guardar</button>

<a href="{{ route('entradainventarios.index') }}">
    <button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection