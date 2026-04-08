@extends('layouts.cliente')

@section('content')

<div class="services">

    <h1>Nuestros Servicios</h1>

    <div class="grid">

        <!-- PLAYERAS -->
        <a href="{{ url('/playeras') }}" class="card">
            <img src="{{ asset('images/legatosoul.png') }}">
            <p>Playeras</p>
        </a>

        <!-- SUDADERAS -->
        <a href="{{ url('/sudaderas') }}" class="card">
            <img src="{{ asset('images/darkrai.png') }}">
            <p>Sudaderas</p>
        </a>

        <!-- TAZAS -->
        <a href="{{ url('/tazas') }}" class="card">
            <img src="{{ asset('images/tazasoull.png') }}">
            <p>Tazas</p>
        </a>

        <!-- LONAS -->
        <a href="{{ url('/lonas') }}" class="card">
            <img src="{{ asset('images/lonasoul.png') }}">
            <p>Lonas</p>
        </a>

        <!-- GORRAS -->
        <a href="{{ url('/gorras') }}" class="card">
            <img src="{{ asset('images/gengorrsoul.png') }}">
            <p>Gorras</p>
        </a>

        <!-- TARJETAS -->
        <a href="{{ url('/tarjetas') }}" class="card">
            <img src="{{ asset('images/tarsoul2.png') }}">
            <p>Tarjetas</p>
        </a>

    </div>

    <div style="margin-top: 30px;">
        <a href="{{ route('home') }}" class="btn btn-primary">← Volver</a>
    </div>

</div>

@endsection