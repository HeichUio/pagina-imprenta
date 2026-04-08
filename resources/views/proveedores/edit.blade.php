@extends('layouts.admin')

@section('content')

<h1>Editar Proveedor</h1>

<div class="form-box">

<form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
@csrf
@method('PUT')

<label>Nombre</label>
<input type="text" name="nombre_prov" value="{{ $proveedor->nombre_prov }}" required>

<label>Teléfono</label>
<input type="text" name="telefono_prov" value="{{ $proveedor->telefono_prov }}" required>

<label>Correo</label>
<input type="email" name="correo_pro" value="{{ $proveedor->correo_pro }}" required>

<br>

<button type="submit" class="btn btn-success">
    Actualizar
</button>

<a href="{{ route('proveedores.index') }}">
    <button type="button" class="btn">
        ← Volver
    </button>
</a>

</form>

</div>

@endsection