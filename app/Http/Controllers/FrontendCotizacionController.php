<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendCotizacionController extends Controller
{
    public function store(Request $request)
    {

        dd($request->all());

        // Validación
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|numeric|min:1',
            'descripcion' => 'required|string'
        ]);

        // Crear cotización
        $idCotizacion = DB::table('cotizaciones')->insertGetId([
            'fecha_creacion' => now(),
            'fecha_vigencia' => now()->addDays(7),
            'estado_c' => 'pendiente',
            'id_usuario' => auth()->id() ?? 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Obtener producto
        $producto = DB::table('productos')
            ->where('id_producto', $request->id_producto)
            ->first();

        // Cálculo
        $cantidad = $request->cantidad;
        $precio = $producto->precio_venta;
        $subtotal = $precio * $cantidad;

        // Guardar detalle
        DB::table('detalle_cotizacion')->insert([
            'descripcion_cot' => $request->descripcion,
            'cantidad' => $cantidad,
            'precio_unitario' => $precio,
            'subtotal' => $subtotal,
            'id_cotizacion' => $idCotizacion,
            'id_producto' => $producto->id_producto,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}