<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Imprenta - Bienvenida</title>
</head>
<body>

    <h1>Bienvenido a la Imprenta</h1>

    <p>Gestiona y cotiza tus servicios de impresión fácilmente.</p>

    <br>

    @if (session('success'))
        <div style="
            background-color: #d1fae5;
            color: #065f46;
            padding: 15px;
            margin: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <br>

    @guest
        <!-- Si NO está logueado -->
        <a href="{{ route('login') }}">
            <button type="button">Iniciar Sesión</button>
        </a>

        <br><br>

        <a href="{{ route('register') }}">
            <button type="button">Registrarse</button>
        </a>
    @endguest


    @auth
    
        <br>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>
    @endauth

</body>
</html>