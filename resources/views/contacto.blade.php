<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Contacto - SoulPrint</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

/* BASE */
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
    padding: 15px 50px;
    background: #111;
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
    position: relative;
}

/* hover línea */
.nav a::after {
    content: "";
    position: absolute;
    width: 0%;
    height: 2px;
    bottom: -5px;
    left: 0;
    background: #4b7bff;
    transition: 0.3s;
}

.nav a:hover::after {
    width: 100%;
}

/* CONTENEDOR */
.container {
    padding: 60px;
}

/* TITULO */
.title {
    text-align: center;
    margin-bottom: 40px;
}

.title h1 {
    font-size: 50px;
}

/* GRID */
.grid {
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
    justify-content: center;
}

/* CARD */
.card {
    flex: 1;
    min-width: 300px;
    max-width: 500px;
    background: #1a1a1a;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(75,123,255,0.2);
    transition: 0.3s;
}

.card:hover {
    transform: scale(1.02);
    box-shadow: 0 0 25px #4b7bff;
}

/* FORM */
input, textarea {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: none;
    background: #0f0f0f;
    color: white;
    transition: 0.3s;
}

input:focus, textarea:focus {
    box-shadow: 0 0 10px #4b7bff;
    outline: none;
}

/* BOTÓN */
.btn {
    display: inline-block;
    padding: 15px 25px;
    border-radius: 10px;
    background: linear-gradient(45deg, #2f49ff, #4b5cff);
    color: white;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px #4b7bff;
}

/* INFO */
.info p {
    margin: 15px 0;
    color: #ccc;
}

/* FOOTER */
.footer {
    margin-top: 50px;
    padding: 30px;
    text-align: center;
    background: #111;
    color: #aaa;
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
        <a href="{{ route('servicios') }}">Servicios</a>
        <a href="{{ route('contacto') }}">Contacto</a>
    </div>

</div>

<div class="container">

    <!-- TITULO -->
    <div class="title">
        <h1>Contacto</h1>
        <p>¿Tienes dudas o quieres cotizar? Escríbenos.</p>
    </div>

    <div class="grid">

        <!-- FORMULARIO -->
        <div class="card">
            <h2>Envíanos un mensaje</h2>

            <form onsubmit="enviarWhatsApp(event)">
                <input type="text" id="nombre" placeholder="Nombre" required>
                <input type="email" id="correo" placeholder="Correo electrónico" required>
                <textarea id="mensaje" rows="5" placeholder="Mensaje"></textarea>

                <button type="submit" class="btn">Enviar mensaje</button>
            </form>
        </div>

        <!-- INFO -->
        <div class="card info">
            <h2>Información</h2>

            <p>📧 theheichuio@gmail.com</p>
            <p>📞 +52 729 129 2501</p>
            <p>📍 Lerma, Santa Cruz Chignahuapan, Estado de México</p>

            <p>
                En SoulPrint nos especializamos en productos personalizados
                de alta calidad para tu negocio o uso personal.
            </p>

        </div>

    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    <p>© 2026 SoulPrint - Todos los derechos reservados</p>
</div>

<script>
function enviarWhatsApp(e) {
    e.preventDefault();

    //  Obtener datos
    let nombre = document.getElementById('nombre').value;
    let correo = document.getElementById('correo').value;
    let mensaje = document.getElementById('mensaje').value;

    //  Número (CAMBIA ESTE)
    let numero = "7291292501"; 

    //  Armar mensaje PRO
    let texto = encodeURIComponent(
    `Hola, quiero información desde la web:

    Nombre: ${nombre}
    Correo: ${correo}
    Mensaje: ${mensaje}`
    );

    //  URL WhatsApp
    let url = `https://wa.me/${7291292501}?text=${texto}`;

    //  Abrir WhatsApp
    window.open(url, '_blank');
}
</script>

</body>
</html>