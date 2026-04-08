<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tarjetas</title>

<!-- CSS GLOBAL -->
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">

<style>

/* NAV */
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

<!-- NAV -->
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
        <h1>Tarjetas</h1>
        <h2>Personalizadas</h2>

        <p>
            Tarjetas personalizadas de alta calidad ideales para
            negocios, presentación profesional o eventos especiales.
        </p>

        <div class="price">$300.00 MXN</div>

        <ul>
            <li>✔ Impresión profesional de alta calidad</li>
            <li>✔ Diferentes acabados disponibles</li>
            <li>✔ Diseños personalizados a tu gusto</li>
            <li>✔ Por millar</li>
        </ul>

        <!-- 🔥 CORREGIDO -->
        <a href="{{ route('cotizar', 9) }}" class="btn">Cotizar Tarjetas</a>
    </div>

    <!-- CARRUSEL -->
    <div class="carousel">

        <input type="radio" name="slider" id="img1" checked>
        <input type="radio" name="slider" id="img2">
        <input type="radio" name="slider" id="img3">
        <input type="radio" name="slider" id="img4">
        <input type="radio" name="slider" id="img5">

        <div class="slides">
            <div class="slide"><img src="{{ asset('images/tarsoul.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/tarsoul1.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/tarsoul2.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/tarsoul3.png') }}"></div>
            <div class="slide"><img src="{{ asset('images/tarsoul4.png') }}"></div>
        </div>

        <div class="controls">
            <label for="img5">◀</label>
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

        <a href="{{ url('/sudaderas') }}" class="card">
            <img src="{{ asset('images/darkrai.png') }}">
            <p>Sudaderas</p>
        </a>

        <a href="{{ url('/tazas') }}" class="card">
            <img src="{{ asset('images/tazasoull.png') }}">
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

    </div>
</div>

<script src="{{ asset('js/carrusel.js') }}"></script>

<!-- JS DROPDOWN -->
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