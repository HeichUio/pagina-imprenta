@extends('layouts.admin')

@section('content')

<h1>Registrar Proveedor</h1>

<div class="form-box">
<form action="{{ route('proveedores.store') }}" method="POST">
@csrf

<input type="text" name="nombre_prov" placeholder="Nombre">
<input type="text" name="telefono_prov" placeholder="Teléfono">
<input type="email" name="correo_pro" placeholder="Correo">

<button class="btn">Guardar</button>

<a href="{{ route('proveedores.index') }}">
<button type="button" class="btn btn-secondary">← Volver</button>
</a>

</form>
</div>

@endsection