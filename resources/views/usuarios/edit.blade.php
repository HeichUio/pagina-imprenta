@extends('layouts.admin')

@section('content')

<h1>Editar Usuario</h1>

<div class="form-box">
<form action="{{ route('usuarios.update', $usuario) }}" method="POST"> 
@csrf
@method('PUT')

<label>Nombre:</label>
<input type="text" name="nombre_u" value="{{ $usuario->nombre_u }}">

<label>Teléfono:</label>
<input type="text" name="telefono_u" value="{{ $usuario->telefono_u }}">

<label>Correo:</label>
<input type="email" name="correo_u" value="{{ $usuario->correo_u }}">

<label>Código postal:</label>
<input type="text" name="codigo_postal" value="{{ $usuario->codigo_postal }}">

<label>Tipo de usuario:</label>
<select name="role">
    <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Administrador</option>
    <option value="cliente" {{ $usuario->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
</select>

<label>Password (opcional):</label>
<input type="password" name="password">

<button class="btn">Actualizar</button>

<a href="{{ route('usuarios.index') }}">
<button type="button" class="btn btn-secondary">← Volver a Usuarios</button>
</a>

</form>
</div>

@endsection