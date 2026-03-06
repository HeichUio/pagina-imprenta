<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/usuarios.css') }}">
</head>
<body>

<form class="login-form" action="{{ route('usuarios.store') }}" method="POST">
    @csrf

    <h1>Registrar Usuario</h1>

    <div class="form-input-material">
        <input type="text" name="nombre_u" placeholder=" " required>
        <label>Nombre</label>
    </div>

    <div class="form-input-material">
        <input type="text" name="telefono_u" placeholder=" " required>
        <label>Teléfono</label>
    </div>

    <div class="form-input-material">
        <input type="email" name="correo_u" placeholder=" " required>
        <label>Correo</label>
    </div>

    <div class="form-input-material">
        <input type="text" name="codigo_postal" placeholder=" " required>
        <label>Código Postal</label>
    </div>

    <div class="form-input-material">
        <select name="role" required>
            <option value="">Seleccione tipo de usuario</option>
            <option value="admin">Administrador</option>
            <option value="cliente">Cliente</option>
        </select>
        
    </div>

    <div class="form-input-material">
        <input type="password" name="password" placeholder=" " required>
        <label>Password</label>
    </div>

    <button type="submit" class="btn">
        Guardar
    </button>

    <!-- Botón volver dentro de la caja y funcionando -->
    <a href="{{ route('usuarios.index') }}" style="width:100%; text-decoration:none;">
        <button type="button" class="btn btn-secondary">
            ← Volver a Usuarios
        </button>
    </a>

</form>

</body>
</html>