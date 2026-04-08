<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetalleCotizacion;

class DetalleCotizacionController extends Controller
{
    
    public function store(Request $request)
    {

        $request->validate([
            'descripcion_cot' => 'required|string',
            'cantidad' => 'required|numeric',
            'precio_unitario' => 'nullable|numeric',
            'subtotal' => 'required|numeric',
            'id_cotizacion' => 'required',
            'id_producto' => 'required'
        ]);

        $detalle = DetalleCotizacion::create([
            'descripcion_cot' => $request->descripcion_cot,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'subtotal' => $request->subtotal,
            'id_cotizacion' => $request->id_cotizacion,
            'id_producto' => $request->id_producto
        ]);

        return response()->json([
            'message' => 'Detalle de cotización guardado',
            'data' => $detalle
        ], 201);

    }

}