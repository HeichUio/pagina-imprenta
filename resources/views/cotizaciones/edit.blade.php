@extends('layouts.admin')

@section('content')

<h1>Editar Cotización</h1>

<div class="form-box">
<form action="{{ route('cotizaciones.update', $cotizacion->id_cotizacion) }}" method="POST">
@csrf
@method('PUT')

<input type="date" name="fecha_creacion" value="{{ $cotizacion->fecha_creacion }}">
<input type="date" name="fecha_vigencia" value="{{ $cotizacion->fecha_vigencia }}">
<input type="number" name="total_estimado" value="{{ $cotizacion->total_estimado }}">
<input type="text" name="estado_c" value="{{ $cotizacion->estado_c }}">

<select name="id_usuario">
@foreach($usuarios as $usuario)
<option value="{{ $usuario->id_usuario }}">
{{ $usuario->nombre_u }}
</option>
@endforeach
</select>

<button class="btn">Actualizar</button>

<a href="{{ route('cotizaciones.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection