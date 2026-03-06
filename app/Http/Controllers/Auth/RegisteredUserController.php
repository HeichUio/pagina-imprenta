<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,correo_u'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefono_u' => ['required', 'digits:10'],
            'codigo_postal' => ['required', 'digits:5'],
        ]);

        $usuario = Usuario::create([
            'nombre_u' => $request->name,
            'telefono_u' => null,
            'correo_u' => $request->email,
            'codigo_postal' => null,
            'role' => 'cliente',
            'password' => Hash::make($request->password),
            'telefono_u' => $request->telefono_u,
            'codigo_postal' => $request->codigo_postal,
        ]);

        event(new Registered($usuario));

        Auth::login($usuario);

        return redirect('/')->with('success', 'Usuario registrado correctamente');
    }
}
