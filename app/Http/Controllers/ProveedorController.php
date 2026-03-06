<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_prov'   => 'required|string|max:255|unique:proveedores,nombre_prov',
            'telefono_prov' => 'required|string|max:12',
            'correo_pro'    => 'required|email|max:255|unique:proveedores,correo_pro'
        ]);

        Proveedor::create($request->only([
            'nombre_prov',
            'telefono_prov',
            'correo_pro'
        ]));

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor creado correctamente');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre_prov'   => 'required|string|max:255|unique:proveedores,nombre_prov,' . $proveedor->id_proveedor . ',id_proveedor',
            'telefono_prov' => 'required|string|max:12',
            'correo_pro'    => 'required|email|max:255|unique:proveedores,correo_pro,' . $proveedor->id_proveedor . ',id_proveedor'
        ]);

        $proveedor->update($request->only([
            'nombre_prov',
            'telefono_prov',
            'correo_pro'
        ]));

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente');
    }
}
