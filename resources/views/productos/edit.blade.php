<h1> Editar Usuario</h1>
<form action="{{ route('productos.update', $producto) }}" method="POST"> 
    @csrf
    @method('PUT')
    
    <label>Nombre:</label><br>
    <input type="text" name="nombre_p" value="{{ $producto->nombre_p}}"><br><br>

    <label>Descripción:</label><br>
    <input type="text" name="descripcion_p" value="{{ $producto->descripcion_p}}"><br><br>

    <label>Unidad de medida:</label><br>
    <input type="text" name="unidad_m" value="{{ $producto->unidad_m}}"><br><br>

    <label>Costo unitario:</label><br>
    <input type="number" step="0.01" name="costo_unitario" value="{{ $producto->costo_unitario}}"><br><br>

    <label>Precio de venta:</label><br>
    <input type="number" step="0.01" name="precio_venta" value="{{ $producto->precio_venta}}"><br><br>

    <label>Cantidad disponible:</label><br>
    <input type="number" name="cantidad_disponible" value="{{ $producto->cantidad_disponible}}"><br><br>

    <label>Fecha de entrada:</label><br>
    <input type="date" name="fecha_entrada" value="{{ $producto->fecha_entrada}}"><br><br>

    <label>Proveedor:</label><br>
    <label>Proveedor:</label><br>
    <select name="id_proveedor">
    <option value="">Seleccione proveedor</option>

    @foreach($proveedores as $proveedor)
        <option value="{{ $proveedor->id_proveedor }}"
            {{ $producto->id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>
            {{ $proveedor->nombre_prov }}
        </option>
    @endforeach

</select><br><br>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('productos.index') }}">
    <button>← Volver a Productos</button>
</a>