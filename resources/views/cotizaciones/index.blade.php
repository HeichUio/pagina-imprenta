@extends('layouts.admin')

@section('content')

<h1>Lista de cotizaciones</h1>

<a href="{{ route('cotizaciones.create') }}">
    <button class="btn btn-primary">Nueva cotización</button>
</a>

<a href="{{ route('admin.inicio') }}">
    <button class="btn">← Volver</button>
</a>

<table>
<tr>
    <th>ID</th>
    <th>Creación</th>
    <th>Vigencia</th>
    <th>Total</th>
    <th>Estado</th>
    <th>Cliente</th>
    <th>Acciones</th>
</tr>

@forelse ($cotizaciones as $cotizacion)
<tr>
    <td>{{ $cotizacion->id_cotizacion }}</td>
    <td>{{ $cotizacion->fecha_creacion }}</td>
    <td>{{ $cotizacion->fecha_vigencia }}</td>
    <td>{{ $cotizacion->total_estimado }}</td>
    <td>{{ $cotizacion->estado_c }}</td>
    <td>{{ $cotizacion->usuario->nombre_u ?? 'Sin cliente' }}</td>

    <td>
        <a href="{{ route('cotizaciones.edit', $cotizacion) }}">
            <button class="btn btn-primary">Editar</button>
        </a>

        <form action="{{ route('cotizaciones.destroy', $cotizacion) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="7">No hay cotizaciones</td>
</tr>
@endforelse

</table>

@endsection