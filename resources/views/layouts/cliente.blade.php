<!DOCTYPE html> 
<html lang="es">
<head>
<meta charset="UTF-8">
<title>SoulPrint</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

/* RESET */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #0f0f0f;
    color: white;
}

/* NAV */
.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 50px;
    background: #111;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo img {
    width: 40px;
}

/* LINKS */
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

/* hover línea */
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
    transition: 0.3s;
}

.user-btn:hover { background: #1a1a1a; }

/* DROPDOWN */
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
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
    animation: fadeIn 0.3s ease;
}

.user-name {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
}

.dropdown a {
    text-decoration: none;
    color: white;
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

.logout-btn:hover { background: #ff2a2a; }

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px);}
    to { opacity: 1; transform: translateY(0);}
}

/* HERO (FADE ORIGINAL QUE SÍ FUNCIONA) */
.hero {
    position: relative;
    height: 85vh;
    overflow: hidden;
}

/* slides */
.slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    transition: opacity 0.6s ease;
    background-size: cover;
    background-position: center;
}

/* overlay */
.slide::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.6);
}

/* slide activo */
.slide.active {
    opacity: 1;
}

/* contenido */
.hero-content {
    position: relative;
    z-index: 2;
    max-width: 550px;
    padding: 0 80px;
    top: 50%;
    transform: translateY(-50%);
    text-align: left;
}

.hero h1 { font-size: 60px; }
.hero p { color: #aaa; }

/* BOTONES */
.btn {
    display: inline-block;
    padding: 15px 25px;
    border-radius: 10px;
    text-decoration: none;
    transition: 0.3s;
    color: white;
    font-weight: bold;
}

.btn-primary {
    background: linear-gradient(45deg, #2f49ff, #4b5cff);
}

.btn-secondary {
    background: white;
    color: black;
}

.btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px #4b7bff;
}

/* SERVICIOS */
.services { padding: 30px; text-align: center; }

.grid {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.card {
    width: 220px;
    border-radius: 15px;
    overflow: hidden;
    text-decoration: none;
    color: white;
    background: #1a1a1a;
    transition: 0.3s;
}

.card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px #4b7bff;
}

/* BENEFICIOS */
.benefits { padding: 60px; text-align: center; }

/* CTA */
.cta {
    padding: 80px;
    text-align: center;
    background: linear-gradient(45deg, #1a2a5a, #0f0f0f);
}

/* FOOTER */
.footer {
    padding: 30px;
    background: #111;
    text-align: center;
    color: #aaa;
}

</style>
</head>

<body>

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
                <div class="user-name">{{ Auth::user()->nombre_u }}</div>

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

@yield('content')

<script>
function toggleMenu(){
    let m = document.getElementById("dropdownMenu");
    m.style.display = (m.style.display === "flex") ? "none" : "flex";
}
</script>

<!-- ✅ CARRUSEL FUNCIONAL -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    let index = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide(i) {
        slides.forEach(s => s.classList.remove('active'));
        slides[i].classList.add('active');
    }

    setInterval(() => {
        index = (index + 1) % slides.length;
        showSlide(index);
    }, 5000);

});
</script>

</body>
</html>