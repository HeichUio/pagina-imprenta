@extends('layouts.admin')

@section('content')

<h1>Editar Producción</h1>

<div class="form-box">
<form action="{{ route('registro_producciones.update', $registroProduccion->id_registro) }}" method="POST">
@csrf
@method('PUT')

<select name="id_detalle">
@foreach($detalle_cotizaciones as $detalle)
<option value="{{ $detalle->id_detalle }}"
{{ $detalle->id_detalle == $registroProduccion->id_detalle ? 'selected' : '' }}>
{{ $detalle->producto->nombre_p }}
</option>
@endforeach
</select>

<input type="number" name="costo_produccion" value="{{ $registroProduccion->costo_produccion }}">
<input type="text" name="observaciones" value="{{ $registroProduccion->observaciones }}">
<input type="date" name="fecha_salida" value="{{ $registroProduccion->fecha_salida }}">

<button class="btn">Actualizar</button>

<a href="{{ route('registro_producciones.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection