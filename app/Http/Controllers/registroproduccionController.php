<?php

namespace App\Http\Controllers;

use App\Models\DetalleCotizacion;
use App\Models\RegistroProduccion;
use Illuminate\Http\Request;

class RegistroProduccionController extends Controller
{
    public function index()
    {
        $registro_producciones = RegistroProduccion::with('detalle.producto')->get();

        return view('registro_producciones.index', compact('registro_producciones'));
    }

    public function create()
    {
        $detalle_cotizaciones = DetalleCotizacion::with('producto')->get();

        return view('registro_producciones.create', compact('detalle_cotizaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_salida' => 'required|date',
            'costo_produccion' => 'required|numeric',
            'observaciones' => 'required|string',
            'id_detalle' => 'required|exists:detalle_cotizacion,id_detalle'
        ]);

        RegistroProduccion::create($request->all());

        return redirect()->route('registro_producciones.index')
            ->with('success', 'Registro creado correctamente');
    }

    public function edit(RegistroProduccion $registroProduccion)
    {
        $detalle_cotizaciones = DetalleCotizacion::with('producto')->get();

        return view('registro_producciones.edit', compact('registroProduccion', 'detalle_cotizaciones'));
    }

    public function update(Request $request, RegistroProduccion $registroProduccion)
    {
        $request->validate([
            'fecha_salida' => 'required|date',
            'costo_produccion' => 'required|numeric',
            'observaciones' => 'required|string',
            'id_detalle' => 'required|exists:detalle_cotizacion,id_detalle'
        ]);

        $registroProduccion->update($request->all());

        return redirect()->route('registro_producciones.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    public function destroy(RegistroProduccion $registroProduccion)
    {
        $registroProduccion->delete();

        return redirect()->route('registro_producciones.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}