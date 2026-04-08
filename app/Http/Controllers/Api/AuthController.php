<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nombre_u'      => 'required|string|max:255',
            'telefono_u'    => 'required|string|max:12',
            'correo_u'      => 'required|email|max:255|unique:usuarios,correo_u',
            'password'      => 'required|string|min:6',
            'codigo_postal' => 'required|string|max:10',
        ]);

        $usuario = Usuario::create([
            'nombre_u'      => $request->nombre_u,
            'telefono_u'    => $request->telefono_u,
            'correo_u'      => $request->correo_u,
            'password'      => Hash::make($request->password),
            'codigo_postal' => $request->codigo_postal,
            'role' => 'cliente',
        ]);

        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado correctamente',
            'usuario' => $usuario,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo_u' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('correo_u', $request->correo_u)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'usuario' => $usuario,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ]);
    }
}