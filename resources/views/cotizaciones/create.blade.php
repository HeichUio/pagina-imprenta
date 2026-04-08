@extends('layouts.admin')

@section('content')

<h1>Registrar Cotización</h1>

<div class="form-box">
<form action="{{ route('cotizaciones.store') }}" method="POST">
@csrf

<input type="date" name="fecha_creacion">
<input type="date" name="fecha_vigencia">
<input type="number" name="total_estimado" step="0.01">
<input type="text" name="estado_c" placeholder="Estado">

<select name="id_usuario">
@foreach($usuarios as $usuario)
<option value="{{ $usuario->id_usuario }}">
{{ $usuario->nombre_u }}
</option>
@endforeach
</select>

<button class="btn">Guardar</button>

<a href="{{ route('cotizaciones.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection