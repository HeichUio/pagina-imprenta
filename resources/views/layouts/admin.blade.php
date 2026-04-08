<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - SoulPrint</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #0f0f0f;
            color: white;
        }

        /* ===== LAYOUT ===== */
        .wrapper {
            display: flex;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #111;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        .sidebar h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #aaa;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: rgba(75,123,255,0.2);
            color: white;
        }

        /* ===== MAIN ===== */
        .main {
            flex: 1;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: #111;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .navbar .right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* ===== CONTENT ===== */
        .content {
            padding: 30px;
        }

        /* ===== CARDS ===== */
        .card {
            background: rgba(255,255,255,0.05);
            padding: 20px;
            border-radius: 12px;
            text-decoration: none;
            color: white;
            display: inline-block;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px #4b7bff;
        }

        /* ===== GRID ===== */
        .grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* ===== BOTONES ===== */
        .btn {
            padding: 10px 15px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            background: rgba(255,255,255,0.1);
            color: white;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px #4b7bff;
        }

        .btn-primary {
            background: linear-gradient(45deg, #2f49ff, #4b5cff);
        }

        .btn-danger {
            background: linear-gradient(45deg, #ff4b4b, #ff0000);
        }

        .btn-success {
            background: linear-gradient(45deg, #22c55e, #16a34a);
        }

        /* ===== TABLAS ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgba(255,255,255,0.05);
            border-radius: 12px;
            overflow: hidden;
        }

        th {
            background: rgba(75,123,255,0.2);
            color: #93c5fd;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            color: #e2e8f0;
        }

        tr:hover {
            background: rgba(75,123,255,0.1);
        }

        /* ===== FORMULARIOS ===== */
        .form-box {
            background: rgba(255,255,255,0.05);
            padding: 25px;
            border-radius: 12px;
            max-width: 600px;
            margin: 40px auto;
            box-shadow: 0 0 20px rgba(75,123,255,0.2);
        }

        label {
            font-weight: bold;
            color: #93c5fd;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: none;
            background: rgba(255,255,255,0.08);
            color: white;
        }

    </style>
</head>

<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>
            <img src="{{ asset('images/png print.png') }}" width="35">
            SoulPrint
        </h2>

        <a href="{{ route('admin.inicio') }}">Dashboard</a>

        <a href="{{ route('usuarios.index') }}">Usuarios</a>
        <a href="{{ route('proveedores.index') }}">Proveedores</a>
        <a href="{{ route('productos.index') }}">Productos</a>

        <hr>

        <a href="{{ route('cotizaciones.index') }}">Cotizaciones</a>
        <a href="{{ route('detalle_cotizaciones.index') }}">Detalle</a>
        <a href="{{ route('registro_producciones.index') }}">Producción</a>
        <a href="{{ route('entradainventarios.index') }}">Inventario</a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- NAVBAR -->
        <div class="navbar">
            <h3>Panel Administrador</h3>

            <div class="right">
                <span>{{ auth()->user()->nombre_u ?? 'Admin' }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger">Salir</button>
                </form>
            </div>
        </div>

        <!-- CONTENIDO -->
        <div class="content">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>