@extends('layouts.admin')

@section('content')

<h1>Lista de productos</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('productos.create') }}">
    <button class="btn btn-primary">Nuevo producto</button>
</a>

<a href="{{ route('admin.inicio') }}">
    <button class="btn">← Volver</button>
</a>

<table>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Unidad</th>
    <th>Costo</th>
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Fecha</th>
    <th>Proveedor</th>
    <th>Acciones</th>
</tr>

@forelse ($productos as $producto)
<tr>
    <td>{{ $producto->id_producto }}</td>
    <td>{{ $producto->nombre_p }}</td>
    <td>{{ $producto->descripcion_p }}</td>
    <td>{{ $producto->unidad_m }}</td>
    <td>{{ $producto->costo_unitario }}</td>
    <td>{{ $producto->precio_venta }}</td>
    <td>{{ $producto->cantidad_disponible }}</td>
    <td>{{ $producto->fecha_entrada }}</td>
    <td>{{ $producto->proveedor->nombre_prov ?? 'Sin proveedor' }}</td>

    <td>
        <a href="{{ route('productos.edit', $producto) }}">
            <button class="btn btn-primary">Editar</button>
        </a>

        <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="10">No hay productos</td>
</tr>
@endforelse

</table>

@endsection