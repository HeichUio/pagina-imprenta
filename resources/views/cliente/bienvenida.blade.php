@extends('layouts.cliente')

@section('content')

<section class="hero">

    <!-- PLAYERAS -->
    <div class="slide active" style="background-image: url('{{ asset('images/legatosoul.png') }}')">
        <div class="hero-content">
            <h1>Playeras Personalizadas</h1>
            <p>Diseños únicos para tu marca o estilo.</p>
            <a href="/playeras" class="btn btn-primary">Explorar</a>
        </div>
    </div>

    <!-- SUDADERAS -->
    <div class="slide" style="background-image: url('{{ asset('images/darkrai.png') }}')">
        <div class="hero-content">
            <h1>Sudaderas Premium</h1>
            <p>Calidad y estilo en cada detalle.</p>
            <a href="/sudaderas" class="btn btn-primary">Explorar</a>
        </div>
    </div>

    <!-- TAZAS -->
    <div class="slide" style="background-image: url('{{ asset('images/tazasoull.png') }}')">
        <div class="hero-content">
            <h1>Tazas Personalizadas</h1>
            <p>Tu diseño favorito en cada sorbo.</p>
            <a href="/tazas" class="btn btn-primary">Explorar</a>
        </div>
    </div>

</section>

<div class="services">
    <h2>Nuestros Productos</h2>

    <div class="grid">
        <a href="/playeras" class="card">
            <img src="{{ asset('images/legatosoul.png') }}">
            <p>Playeras</p>
        </a>

        <a href="/sudaderas" class="card">
            <img src="{{ asset('images/darkrai.png') }}">
            <p>Sudaderas</p>
        </a>

        <a href="/tazas" class="card">
            <img src="{{ asset('images/tazasoull.png') }}">
            <p>Tazas</p>
        </a>

        <a href="/gorras" class="card">
            <img src="{{ asset('images/gorrsoul.png') }}">
            <p>Gorras</p>
        </a>

        <a href="/lonas" class="card">
            <img src="{{ asset('images/lonasoul.png') }}">
            <p>Lonas</p>
        </a>

        <a href="/tarjetas" class="card">
            <img src="{{ asset('images/tarsoul1.png') }}">
            <p>Tarjetas</p>
        </a>
    </div>
</div>

<div class="benefits">
    <h2>¿Por qué elegirnos?</h2>
    <ul>
        <li>✔ Alta calidad</li>
        <li>✔ Precios competitivos</li>
        <li>✔ Entrega rápida</li>
    </ul>
</div>

<div class="cta">
    <h2>¿Listo para empezar?</h2>
    <a href="{{ route('servicios') }}" class="btn btn-primary">Solicitar cotización</a>
</div>

<div class="footer">
    <p>© 2026 SoulPrint</p>
</div>

@endsection