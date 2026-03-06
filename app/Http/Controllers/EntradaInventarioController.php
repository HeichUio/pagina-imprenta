<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\EntradaInventario;
use Illuminate\Http\Request;

class EntradaInventarioController extends Controller
{
    public function index()
    {
        $entradainventarios = EntradaInventario::with('producto')->get();
        return view('entradainventarios.index', compact('entradainventarios'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('entradainventarios.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto'    => 'required|exists:productos,id_producto',
            'cantidad'       => 'required|numeric|min:1',
            'costo_unitario' => 'required|numeric|min:0',
            'observaciones'  => 'nullable|string|max:255',
            'fecha_entrada'  => 'required|date',
        ]);

        EntradaInventario::create([
            'id_producto'    => $request->id_producto,
            'cantidad'       => $request->cantidad,
            'costo_unitario' => $request->costo_unitario,
            'observaciones'  => $request->observaciones,
            'fecha_entrada'  => $request->fecha_entrada,
        ]);

        return redirect()->route('entradainventarios.index')
            ->with('success', 'Entrada registrada correctamente');
    }

    public function edit(EntradaInventario $entradainventario)
    {
        $productos = Producto::all();
        return view('entradainventarios.edit', compact('entradainventario', 'productos'));
    }

    public function update(Request $request, EntradaInventario $entradainventario)
    {
        $request->validate([
            'id_producto'    => 'required|exists:productos,id_producto',
            'cantidad'       => 'required|numeric|min:1',
            'costo_unitario' => 'required|numeric|min:0',
            'observaciones'  => 'nullable|string|max:255',
            'fecha_entrada'  => 'required|date',
        ]);

        $entradainventario->update($request->all());

        return redirect()->route('entradainventarios.index')
            ->with('success', 'Entrada actualizada correctamente');
    }

    public function destroy(EntradaInventario $entradainventario)
    {
        $entradainventario->delete();

        return redirect()->route('entradainventarios.index')
            ->with('success', 'Entrada eliminada correctamente');
    }

    public function show(EntradaInventario $entradainventario)
    {
        return view('entradainventarios.show', compact('entradainventario'));
    }
}