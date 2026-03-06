<h1> Editar Usuario</h1>
<form action="{{ route('usuarios.update', $usuario) }}" method="POST"> 
    @csrf
    @method('PUT')
    
    <label>Nombre:</label><br>
    <input type="text" name="nombre_u" value="{{ $usuario->nombre_u }}"><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono_u" value="{{ $usuario->telefono_u }}"><br>

    <label>Correo:</label><br>
    <input type="email" name="correo_u" value="{{ $usuario->correo_u }}"><br>

    <label>Codigo postal:</label><br>
    <input type="text" name="codigo_postal" value="{{ $usuario->codigo_postal }}"><br>

    <label>Tipo de usuario</label><br>
    <select name="role">
        <option value="admin" {{ $usuario->role == 'admin' ? 'selected' : '' }}>Administrador</option>
        <option value="cliente" {{ $usuario->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
    </select><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br>

    <button type="submit">Actualizar</button>
    
</form>

<a href="{{ route('usuarios.index') }}">
    <button type="button">← Volver a Usuarios</button>
</a>