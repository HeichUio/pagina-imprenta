@extends('layouts.admin')

@section('content')

<h1>Registrar Usuario</h1>

<div class="form-box">

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf

    <label>Nombre</label>
    <input type="text" name="nombre_u" required>

    <label>Teléfono</label>
    <input type="text" name="telefono_u" required>

    <label>Correo</label>
    <input type="email" name="correo_u" required>

    <label>Código Postal</label>
    <input type="text" name="codigo_postal" required>

    <label>Tipo de Usuario</label>
    <select name="role" required>
        <option value="">Seleccione</option>
        <option value="admin">Administrador</option>
        <option value="cliente">Cliente</option>
    </select>

    <label>Password</label>
    <input type="password" name="password" required>

    <br>

    <button type="submit" class="btn btn-success">
        Guardar
    </button>

    <a href="{{ route('usuarios.index') }}" class="btn">
        ← Volver
    </a>

</form>

</div>

@endsection