<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor; 
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::with('proveedor')->get(); 
        return view('productos.index', compact('productos'));
    }

    
    public function create()
    {
        $proveedores = Proveedor::all(); 
        return view('productos.create', compact('proveedores'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre_p'            => 'required|string|max:255',
            'descripcion_p'       => 'required',
            'unidad_m'            => 'required',
            'costo_unitario'      => 'required|numeric',
            'precio_venta'        => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
            'fecha_entrada'       => 'required|date',
            'id_proveedor'        => 'required|exists:proveedores,id_proveedor'
        ]);

        Producto::create($request->only([
            'nombre_p',
            'descripcion_p',
            'unidad_m',
            'costo_unitario',
            'precio_venta',
            'cantidad_disponible',
            'fecha_entrada',
            'id_proveedor'
        ]));

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    
    public function edit(Producto $producto)
    {
        $proveedores = Proveedor::all(); 
        return view('productos.edit', compact('producto', 'proveedores'));
    }

    
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre_p'            => 'required|string|max:255',
            'descripcion_p'       => 'required',
            'unidad_m'            => 'required',
            'costo_unitario'      => 'required|numeric',
            'precio_venta'        => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
            'fecha_entrada'       => 'required|date',
            'id_proveedor'        => 'required|exists:proveedores,id_proveedor'
        ]);

        $producto->update($request->only([
            'nombre_p',
            'descripcion_p',
            'unidad_m',
            'costo_unitario',
            'precio_venta',
            'cantidad_disponible',
            'fecha_entrada',
            'id_proveedor'
        ]));

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
