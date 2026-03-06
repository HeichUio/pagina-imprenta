<h1> Editar provedor</h1>
<form action="{{ route('proveedores.update', $proveedor) }}" method="POST"> 
    @csrf
    @method('PUT')
    
    <label>Nombre:</label><br>
    <input type="text" name="nombre_prov" value="{{ $proveedor->nombre_prov}}"><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono_prov" value="{{ $proveedor->telefono_prov}}" ><br>

    <label>Correo:</label><br>
    <input type="email" name="correo_pro" value="{{ $proveedor->correo_pro}}" ><br>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('proveedores.index') }}">
    <button>← Volver a Proveedores</button>
</a>