@extends('layouts.admin')

@section('content')

<h1>Lista de Usuarios</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('usuarios.create') }}">
    <button class="btn btn-primary">Nuevo Usuario</button>
</a>

<a href="{{ route('admin.inicio') }}">
    <button class="btn">← Volver</button>
</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Código Postal</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>

    @forelse ($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->id_usuarios }}</td>
        <td>{{ $usuario->nombre_u }}</td>
        <td>{{ $usuario->telefono_u }}</td>
        <td>{{ $usuario->correo_u }}</td>
        <td>{{ $usuario->codigo_postal }}</td>
        <td>{{ $usuario->role }}</td>
        <td>
            <a href="{{ route('usuarios.edit', $usuario) }}">
                <button class="btn btn-primary">Editar</button>
            </a>

            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7">No hay usuarios</td>
    </tr>
    @endforelse
</table>

@endsection