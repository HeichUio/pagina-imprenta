@extends('layouts.admin')

@section('content')

<h1>Lista de entrada de productos</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('entradainventarios.create') }}">
    <button class="btn btn-primary">Registrar entrada</button>
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
    <th>Observaciones</th>
    <th>Fecha</th>
    <th>Acciones</th>
</tr>

@forelse ($entradainventarios as $entrada)
<tr>
    <td>{{ $entrada->id_entrada }}</td>

    <td>{{ $entrada->producto->nombre_p ?? 'Sin producto' }}</td>

    <td>{{ $entrada->cantidad }}</td>

    <td>${{ number_format($entrada->costo_unitario, 2) }}</td>

    <td>{{ $entrada->observaciones }}</td>

    <td>{{ $entrada->fecha_entrada }}</td>

    <td>
        <a href="{{ route('entradainventarios.edit', $entrada->id_entrada) }}">
            <button class="btn btn-primary">Editar</button>
        </a>

        <form action="{{ route('entradainventarios.destroy', $entrada->id_entrada) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="7">No hay registros</td>
</tr>
@endforelse

</table>

@endsection