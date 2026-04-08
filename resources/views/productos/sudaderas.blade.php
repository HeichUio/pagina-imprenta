<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sudaderas</title>

<!-- CSS GLOBAL -->
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">

<style>

/* 🔥 SOLO ESTILOS DEL NAV (NO TOCO NADA MÁS) */
.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 50px;
    background: #111;
}

.logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo img {
    width: 40px;
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    position: relative;
}

.nav-links a::after {
    content: "";
    position: absolute;
    width: 0%;
    height: 2px;
    bottom: -5px;
    left: 0;
    background: #4b7bff;
    transition: 0.3s;
}

.nav-links a:hover::after {
    width: 100%;
}

/* USER MENU */
.user-menu { position: relative; }

.user-btn {
    cursor: pointer;
    padding: 8px 15px;
    border-radius: 10px;
}

.user-btn:hover { background: #1a1a1a; }

.dropdown {
    position: absolute;
    right: 0;
    top: 45px;
    background: #1a1a1a;
    border-radius: 12px;
    padding: 15px;
    width: 220px;
    display: none;
    flex-direction: column;
    gap: 10px;
}

.user-name {
    font-weight: bold;
    text-align: center;
}

.dropdown a {
    color: white;
    text-decoration: none;
    padding: 8px;
    border-radius: 8px;
}

.dropdown a:hover { background: #2a2a2a; }

.logout-btn {
    background: #ff4b4b;
    border: none;
    padding: 8px;
    border-radius: 8px;
    color: white;
    cursor: pointer;
}

</style>

</head>

<body>

<!-- 🔥 NAV NUEVO -->
<div class="nav">

    <div class="logo">
        <img src="{{ asset('images/png print.png') }}">
        <b>SoulPrint</b>
    </div>

    <div class="nav-links">

        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('servicios') }}">Servicios</a>
        <a href="{{ route('contacto') }}">Contacto</a>

        @guest
            <a href="{{ route('login') }}">Iniciar sesión</a>
            <a href="{{ route('register') }}">Registro</a>
        @endguest

        @auth
        <div class="user-menu">

            <div class="user-btn" onclick="toggleMenu()">
                👤 {{ Auth::user()->nombre_u }}
            </div>

            <div class="dropdown" id="dropdownMenu">

                <div class="user-name">
                    {{ Auth::user()->nombre_u }}
                </div>

                <a href="{{ route('servicios') }}">Servicios</a>
                <a href="{{ route('contacto') }}">Contacto</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout-btn">Cerrar sesión</button>
                </form>

            </div>

        </div>
        @endauth

    </div>

</div>

<div class="container">

    <!-- INFO -->
    <div class="info">
        <h1>Sudaderas</h1>
        <h2>Personalizadas</h2>

        <p>
            Sudaderas personalizadas de alta calidad, ideales para clima frío,
            equipos, empresas o uso diario.
        </p>

        <div class="price">$350.00 MXN</div>

        <ul>
            <li>✔ Tela cómoda y resistente</li>
            <li>✔ Impresión duradera</li>
            <li>✔ Personalización completa</li>
        </ul>

        <a href="{{ route('cotizar', 5) }}" class="btn">Cotizar Sudadera</a>
    </div>

    <!-- CARRUSEL (NO TOCADO) -->
    <div class="carousel">

        <input type="radio" name="slider" id="img1" checked>
        <input type="radio" name="slider" id="img2">
        <input type="radio" name="slider" id="img3">
        <input type="radio" name="slider" id="img4">
        <input type="radio" name="slider" id="img5">
        <input type="radio" name="slider" id="img6">
        <input type="radio" name="slider" id="img7">

        <div class="slides">
            <div class="slide"><img src="{{ asset('images/gen.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/gar.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/darkrai.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/example 2.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/jiglypuf.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/sailor.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/moonn.png') }}"></div>
        </div>

        <div class="controls">
            <label for="img7">◀</label>
            <label for="img2">▶</label>
        </div>

    </div>

</div>

<!-- PRODUCTOS -->
<div class="products">
    <h2>Descubre nuestros productos</h2>

    <div class="grid">

        <a href="{{ url('/playeras') }}" class="card">
            <img src="{{ asset('images/legatosoul.png') }}">
            <p>Playeras</p>
        </a>

        <a href="{{ url('/tazas') }}" class="card">
            <img src="{{ asset('images/legato.png') }}">
            <p>Tazas</p>
        </a>

        <a href="{{ url('/gorras') }}" class="card">
            <img src="{{ asset('images/gorrsoul.png') }}">
            <p>Gorras</p>
        </a>

        <a href="{{ url('/lonas') }}" class="card">
            <img src="{{ asset('images/lonasoul.png') }}">
            <p>Lonas</p>
        </a>

        <a href="{{ url('/tarjetas') }}" class="card">
            <img src="{{ asset('images/tarsoul1.png') }}">
            <p>Tarjetas</p>
        </a>

    </div>
</div>

<script src="{{ asset('js/carrusel.js') }}"></script>

<!-- 🔥 JS DROPDOWN -->
<script>
function toggleMenu(){
    let m = document.getElementById("dropdownMenu");
    m.style.display = (m.style.display === "flex") ? "none" : "flex";
}

window.onclick = function(e) {
    if (!e.target.closest('.user-menu')) {
        let menu = document.getElementById("dropdownMenu");
        if(menu) menu.style.display = "none";
    }
}
</script>

</body>
</html>