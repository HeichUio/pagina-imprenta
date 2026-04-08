<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SoulPrint</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #0f0f0f;
    color: white;
}

/* NAV */
.nav {
    position: absolute;
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 20px 50px;
    z-index: 10;
}

.logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo img { width: 40px; }

.nav a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
}

/* LAYOUT */
.wrapper {
    display: flex;
    height: 100vh;
}

/* IZQUIERDA (CARRUSEL) */
.left {
    flex: 1;
    background-size: cover;
    background-position: center;
    position: relative;
    transition: 0.5s;
}

.left::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.6);
}

/* TEXTO SOBRE IMAGEN */
.hero-text {
    position: absolute;
    bottom: 80px;
    left: 60px;
    z-index: 2;
    max-width: 400px;
}

.hero-text h1 {
    font-size: 40px;
}

.hero-text p {
    color: #ccc;
}

/* DERECHA (FORM) */
.right {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* CARD */
.card {
    width: 100%;
    max-width: 400px;
    padding: 30px;
    border-radius: 15px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    box-shadow: 0 0 30px rgba(75,123,255,0.2);
}

/* INPUTS */
input {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    border-radius: 8px;
    border: none;
    background: rgba(255,255,255,0.08);
    color: white;
    transition: 0.3s;
}

input:focus {
    box-shadow: 0 0 10px #4b7bff;
}

/* BOTÓN */
button {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: none;
    margin-top: 20px;
    background: linear-gradient(45deg, #2f49ff, #4b5cff);
    color: white;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

button::after {
    content: "";
    position: absolute;
    width: 120%;
    height: 100%;
    left: -120%;
    top: 0;
    background: linear-gradient(120deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: 0.5s;
}

button:hover::after {
    left: 120%;
}

/* FADE */
.fade {
    opacity: 0.4;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .left { display: none; }
    .right { flex: 1; }
}

/* INPUT CON ICONO */
.input-group {
    position: relative;
    margin-top: 15px;
}

.input-group input {
    padding-left: 40px;
}

/* ICONO */
.input-group span {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    opacity: 0.7;
}

/* OJO PASSWORD */
.toggle-pass {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

/* HOVER INPUT */
input:hover {
    transform: scale(1.02);
}


</style>
</head>

<body>

<!-- NAV -->
<div class="nav">
    <div class="logo">
        <img src="{{ asset('images/png print.png') }}">
        <b>SoulPrint</b>
    </div>

    <div>
        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('login') }}">Iniciar sesión</a>
        <a href="{{ route('register') }}">Registro</a>
    </div>
</div>

<div class="wrapper">

    <!-- IZQUIERDA -->
    <div class="left">
        <div class="hero-text">
            <h1>Playeras Personalizadas</h1>
            <p>Diseños únicos para tu marca.</p>
        </div>
    </div>

    <!-- DERECHA -->
    <div class="right">
        <div class="card">
            {{ $slot }}
        </div>
    </div>

</div>

<!-- JS -->
<script src="{{ asset('js/auth-carousel.js') }}"></script>

<script src="{{ asset('js/auth-ui.js') }}"></script>

</body>
</html>