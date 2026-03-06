<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\detallecotizacioncontroller;
use App\Http\Controllers\registroproduccioncontroller;
use App\Http\Controllers\EntradaInventarioController;

/*
|--------------------------------------------------------------------------
| Ruta pública
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('cliente.bienvenida');
})->name('home');


/*
|--------------------------------------------------------------------------
| Rutas protegidas por autenticación
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/cliente', function () {
        return view('cliente.bienvenida');
    })->name('cliente.bienvenida');

    Route::get('/inicio', function () {
        return view('inicio.inicio');
    })->name('admin.inicio');

    Route::resource('usuarios', UsuarioController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('cotizaciones', CotizacionController::class);
    Route::resource('detalle_cotizaciones', detallecotizacioncontroller::class);
    Route::resource('registro_producciones', registroproduccioncontroller::class);
    Route::resource('entradainventarios', EntradaInventarioController::class);

});


/*
|--------------------------------------------------------------------------
| Rutas de autenticación (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';