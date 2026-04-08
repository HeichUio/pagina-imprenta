<?php

namespace App\Http\Controllers;

use App\Models\DetalleCotizacion;
use App\Models\Cotizacion;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleCotizacionController extends Controller
{
    public function index()
    {


        $detalle_cotizaciones = DetalleCotizacion::with([
        'cotizacion.usuario',
        'producto'
    ])->get();

        return view('detalle_cotizaciones.index', compact('detalle_cotizaciones'));
    }

    public function create()
    {
        $productos = Producto::all();

        $cotizaciones = Cotizacion::with('usuario')->get();

    return view('detalle_cotizaciones.create', compact('productos','cotizaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion_cot' => 'required|string',
            'cantidad' => 'required|numeric',
            'precio_unitario' => 'nullable|numeric',
            'subtotal' => 'required|numeric',
            'id_cotizacion' => 'required|exists:cotizaciones,id_cotizacion',
            'id_producto' => 'required|exists:productos,id_producto'
        ]);

        DetalleCotizacion::create($request->all());

        return redirect()->route('detalle_cotizaciones.index')
            ->with('success', 'Registro creado correctamente');
    }

   public function show($id)
    {
        $detalle_cotizacion = DetalleCotizacion::with(['cotizacion','producto'])
            ->findOrFail($id);

        return view('detalle_cotizaciones.show', compact('detalle_cotizacion'));
    }

    public function edit($id)
    {
        $detalle_cotizacion = DetalleCotizacion::findOrFail($id);

        $productos = Producto::all();
        $cotizaciones = Cotizacion::with('usuario')->get();

        return view('detalle_cotizaciones.edit', compact('detalle_cotizacion','productos','cotizaciones'));
    }
    
    

  public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion_cot' => 'required|string',
            'cantidad' => 'required|numeric',
            'precio_unitario' => 'nullable|numeric',
            'subtotal' => 'required|numeric',
            'id_cotizacion' => 'required|exists:cotizaciones,id_cotizacion',
            'id_producto' => 'required|exists:productos,id_producto'
        ]);

        $detalle_cotizacion = DetalleCotizacion::findOrFail($id);

        $detalle_cotizacion->update($request->all());

        return redirect()->route('detalle_cotizaciones.index')
            ->with('success', 'Actualización correcta');
    }

    public function destroy($id)
    {
        $detalle_cotizacion = DetalleCotizacion::findOrFail($id);
        $detalle_cotizacion->delete();

        return redirect()->route('detalle_cotizaciones.index')
            ->with('success', 'Eliminación correcta');
    }
}
