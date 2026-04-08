@extends('layouts.admin')

@section('content')

<h1>Lista de detalles de cotización</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('detalle_cotizaciones.create') }}">
    <button class="btn btn-primary">Nuevo detalle</button>
</a>

<a href="{{ route('admin.inicio') }}">
    <button class="btn">← Volver</button>
</a>

<table>
<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Producto</th>
    <th>Descripción</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>Subtotal</th>
    <th>Acciones</th>
</tr>

@forelse ($detalle_cotizaciones as $detalle)
<tr>
    <td>{{ $detalle->id_detalle }}</td>

    <td>
        {{ optional($detalle->cotizacion->usuario)->nombre_u }}
    </td>

    <td>{{ $detalle->producto->nombre_p }}</td>

    <td>{{ $detalle->descripcion_cot }}</td>
    <td>{{ $detalle->cantidad }}</td>
    <td>{{ $detalle->precio_unitario }}</td>
    <td>{{ $detalle->subtotal }}</td>

    <td>
        <a href="{{ route('detalle_cotizaciones.edit', $detalle->id_detalle) }}">
            <button class="btn btn-primary">Editar</button>
        </a>

        <form action="{{ route('detalle_cotizaciones.destroy', $detalle->id_detalle) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="8">No hay registros</td>
</tr>
@endforelse

</table>

@endsection