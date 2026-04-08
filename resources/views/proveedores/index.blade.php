@extends('layouts.admin')

@section('content')

<h1>Lista de Proveedores</h1>

<a href="{{ route('proveedores.create') }}">
    <button class="btn btn-primary">Nuevo proveedor</button>
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
    <th>Acciones</th>
</tr>

@foreach ($proveedores as $proveedor)
<tr>
    <td>{{ $proveedor->id_proveedor }}</td>
    <td>{{ $proveedor->nombre_prov }}</td>
    <td>{{ $proveedor->telefono_prov }}</td>
    <td>{{ $proveedor->correo_pro }}</td>
    <td>
        <a href="{{ route('proveedores.edit', $proveedor) }}">
            <button class="btn btn-primary">Editar</button>
        </a>

        <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </td>
</tr>
@endforeach

</table>

@endsection