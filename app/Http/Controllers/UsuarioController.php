<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_u'      => 'required|string|max:255|',
            'telefono_u'    => 'required|string|max:12',
            'correo_u'      => 'required|email|max:255|unique:usuarios,correo_u',
            'codigo_postal' => 'required|string|max:10',
            'role' => 'required|in:admin,cliente',
            'password'      => 'required|string|min:6'
        ]);

        Usuario::create([
            'nombre_u'      => $request->nombre_u,
            'telefono_u'    => $request->telefono_u,
            'correo_u'      => $request->correo_u,
            'codigo_postal' => $request->codigo_postal,
            'role'        => $request->role,
            'password'      => Hash::make($request->password)
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre_u'      => 'required|string|max:255|',
            'telefono_u'    => 'required|string|max:12',
            'correo_u'      => 'required|email|max:255|unique:usuarios,correo_u,' . $usuario->id_usuario. ',id_usuario',
            'codigo_postal' => 'required|string|max:10',
            'role' => 'required|in:admin,cliente',
        ]);

        $usuario->update([
            'nombre_u'      => $request->nombre_u,
            'telefono_u'    => $request->telefono_u,
            'correo_u'      => $request->correo_u,
            'codigo_postal' => $request->codigo_postal,
            'role'        => $request->role,
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}
