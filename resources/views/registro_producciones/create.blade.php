@extends('layouts.admin')

@section('content')

<h1>Registrar Producción</h1>

<div class="form-box">
<form action="{{ route('registro_producciones.store') }}" method="POST">
@csrf

<label>Detalle de Cotización:</label>
<select name="id_detalle" required>
    <option value="">Seleccione</option>
    @foreach($detalle_cotizaciones as $detalle)
        <option value="{{ $detalle->id_detalle }}">
            {{ $detalle->producto->nombre_p }} | Cant: {{ $detalle->cantidad }}
        </option>
    @endforeach
</select>

<label>Costo de Producción:</label>
<input type="number" name="costo_produccion" required>

<label>Observaciones:</label>
<input type="text" name="observaciones" required>

<label>Fecha de salida:</label>
<input type="date" name="fecha_salida" required>

<button class="btn">Guardar</button>

<a href="{{ route('registro_producciones.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection