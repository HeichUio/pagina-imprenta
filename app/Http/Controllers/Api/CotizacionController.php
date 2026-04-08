<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cotizacion;

class CotizacionController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'fecha_creacion' => 'required|date',
            'fecha_vigencia' => 'required|date',
            'estado_c' => 'required',
            'id_usuario' => 'required'
        ]);

        $cotizacion = Cotizacion::create([
            'fecha_creacion' => $request->fecha_creacion,
            'fecha_vigencia' => $request->fecha_vigencia,
            'estado_c' => $request->estado_c,
            'id_usuario' => $request->id_usuario
        ]);

        return response()->json([
            'message' => 'Cotización creada',
            'data' => $cotizacion
        ], 201);

    }
    public function cotizacionesPorUsuario($id)
{
    $cotizaciones = Cotizacion::where('id_usuario', $id)->get();

    return response()->json([
        'message' => 'Cotizaciones del usuario',
        'data' => $cotizaciones
    ], 200);
}
public function show($id)
{
    $cotizacion = Cotizacion::with('detalles.producto')
        ->where('id_cotizacion', $id)
        ->first();

    return response()->json([
        'data' => $cotizacion
    ]);
}

}