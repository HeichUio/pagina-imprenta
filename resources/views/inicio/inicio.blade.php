@extends('layouts.admin')

@section('content')

<h1>Dashboard</h1>
<p>Resumen general del sistema</p>

<div class="grid">

    <div class="card">
        <h3>Usuarios</h3>
        <p>{{ $usuarios ?? 0 }}</p>
    </div>

    <div class="card">
        <h3>Productos</h3>
        <p>{{ $productos ?? 0 }}</p>
    </div>

    <div class="card">
        <h3>Cotizaciones</h3>
        <p>{{ $cotizaciones ?? 0 }}</p>
    </div>

    <div class="card">
        <h3>Producción</h3>
        <p>{{ $produccion ?? 0 }}</p>
    </div>

</div>

<h2>Administración</h2>

<div class="grid">
    <a href="{{ route('usuarios.index') }}" class="card">Usuarios</a>
    <a href="{{ route('proveedores.index') }}" class="card">Proveedores</a>
    <a href="{{ route('productos.index') }}" class="card">Productos</a>
</div>

<h2>Operaciones</h2>

<div class="grid">
    <a href="{{ route('cotizaciones.index') }}" class="card">Cotizaciones</a>
    <a href="{{ route('detalle_cotizaciones.index') }}" class="card">Detalle</a>
    <a href="{{ route('registro_producciones.index') }}" class="card">Producción</a>
    <a href="{{ route('entradainventarios.index') }}" class="card">Inventario</a>
</div>

@endsection