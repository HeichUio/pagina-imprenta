@extends('layouts.admin')

@section('content')

<h1>Lista de registros de producción</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('registro_producciones.create') }}">
    <button class="btn btn-primary">Nuevo registro</button>
</a>

<a href="{{ route('admin.inicio') }}">
    <button class="btn">← Volver</button>
</a>

<table>
<tr>
    <th>ID</th>
    <th>Producto</th>
    <th>Cantidad</th>
    <th>Costo</th>
    <th>Venta</th>
    <th>Ganancia</th>
    <th>Observaciones</th>
    <th>Fecha</th>
    <th>Acciones</th>
</tr>

@forelse ($registro_producciones as $registro)
<tr>
    <td>{{ $registro->id_registro }}</td>

    <td>
        {{ optional(optional($registro->detalle)->producto)->nombre_p ?? 'Sin producto' }}
    </td>

    <td>{{ $registro->cantidad_utilizada }}</td>
    <td>{{ $registro->costo_produccion }}</td>
    <td>{{ $registro->venta }}</td>
    <td>{{ $registro->ganancia }}</td>
    <td>{{ $registro->observaciones }}</td>
    <td>{{ $registro->fecha_salida }}</td>

    <td>
        <a href="{{ route('registro_producciones.edit', $registro->id_registro) }}">
            <button class="btn btn-primary">Editar</button>
        </a>

        <form action="{{ route('registro_producciones.destroy', $registro->id_registro) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="9">No hay registros</td>
</tr>
@endforelse

</table>

@endsection