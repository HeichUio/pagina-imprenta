<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{

    public function index()
    {
        
        $cotizaciones = Cotizacion::with('usuario')->get();

        return view('cotizaciones.index', compact('cotizaciones'));
    }


    public function create()
    {
        
        $usuarios = Usuario::all();

        return view('cotizaciones.create', compact('usuarios'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'fecha_creacion'   => 'required|date',
            'fecha_vigencia'   => 'required|date',
            'total_estimado'   => 'nullable|numeric',
            'estado_c'         => 'required|string',
            'id_usuario'       => 'required|exists:usuarios,id_usuario'
        ]);

        Cotizacion::create($request->only([
            'fecha_creacion',
            'fecha_vigencia',
            'total_estimado',
            'estado_c',
            'id_usuario'
        ]));

        return redirect()->route('cotizaciones.index')
            ->with('success', 'Cotización creada correctamente');
    }


    public function show(Cotizacion $cotizacion)
    {
    
        $cotizacion->load('usuario');

        return view('cotizaciones.show', compact('cotizacion'));
    }


    public function edit(Cotizacion $cotizacion)
    {
    
        $usuarios = Usuario::all();

        return view('cotizaciones.edit', compact('cotizacion', 'usuarios'));
    }


    public function update(Request $request, Cotizacion $cotizacion)
    {
        $request->validate([
            'fecha_creacion'   => 'required|date',
            'fecha_vigencia'   => 'required|date',
            'total_estimado'   => 'nullable|numeric',
            'estado_c'         => 'required|string',
            'id_usuario'       => 'required|exists:usuarios,id_usuario'
        ]);

        $cotizacion->update($request->only([
            'fecha_creacion',
            'fecha_vigencia',
            'total_estimado',
            'estado_c',
            'id_usuario'
        ]));

        return redirect()->route('cotizaciones.index')
            ->with('success', 'Cotización actualizada correctamente');
    }


    public function destroy(Cotizacion $cotizacion)
    {
        $cotizacion->delete();

        return redirect()->route('cotizaciones.index')
            ->with('success', 'Cotización eliminada correctamente');
    }
}
