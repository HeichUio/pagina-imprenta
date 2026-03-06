<h1> Editar cotizacion</h1>

<form action="{{ route('cotizaciones.update', $cotizacion) }}" method="POST"> 
    @csrf
    @method('PUT')
    
    <label>Fecha de pedido:</label><br>
    <input type="date" name="fecha_creacion" value="{{ $cotizacion->fecha_creacion}}"><br><br>

    <label>Fecha de vigencia:</label><br>
    <input type="date" name="fecha_vigencia" value="{{ $cotizacion->fecha_vigencia}}"><br><br>

    <label>Total estimado:</label><br>
    <input type="number"  step="0.01" name="total_estimado" value="{{ $cotizacion->total_estimado}}"><br><br>

    <label>Estado:</label><br>
    <input type="text" step="0.01" name="estado_c" value="{{ $cotizacion->estado_c}}"><br><br>

    <label>Cliente:</label><br>
    <select name="id_usuario">
    <option value="">Seleccione el cliente</option>

    @foreach($usuarios as $usuario)
        <option value="{{ $usuario->id_usuario }}"
            {{ $usuario->id_usuario == $usuario->id_usuario ? 'selected' : '' }}>
            {{ $usuario->nombre_u }}
        </option>
    @endforeach

</select><br><br>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('cotizaciones.index') }}">
    <button>← Volver a Cotizaciones</button>
</a>