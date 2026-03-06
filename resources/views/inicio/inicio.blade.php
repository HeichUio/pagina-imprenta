<!DOCTYPE html>
<html>
<head>
    <title>Sistema Imprenta</title>
</head>
<body>

    <h1>Bienvenido al Sistema de Gestión de la Imprenta</h1>
    <p>Selecciona una opción:</p>

    <hr>

    <h2>Administración</h2>

    <a href="{{ route('usuarios.index') }}">
        <button>Usuarios</button>
    </a>

    <a href="{{ route('proveedores.index') }}">
        <button>Proveedores</button>
    </a>

    <a href="{{ route('productos.index') }}">
        <button>Productos</button>
    </a>

    <hr>

    <h2>Operaciones</h2>

    <a href="{{ route('cotizaciones.index') }}">
        <button>Cotizaciones</button>
    </a>

    <a href="{{ route('detalle_cotizaciones.index') }}">
        <button>Detalle Cotizaciones</button>
    </a>

    <a href="{{ route('registro_producciones.index') }}">
        <button>Registro Producción</button>
    </a>

    <a href="{{ route('entradainventarios.index') }}">
        <button>Entrada Inventario</button>
    </a>

    <hr>

    <h2>Sesión</h2>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>

</body>
</html>