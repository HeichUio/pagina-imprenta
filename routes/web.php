<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DetalleCotizacionController;
use App\Http\Controllers\RegistroProduccionController;
use App\Http\Controllers\EntradaInventarioController;
use App\Http\Controllers\FrontendCotizacionController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Ruta pública
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('cliente.bienvenida');
})->name('home');

Route::get('/servicios', function () {
    return view('servicios.index');
})->name('servicios');

Route::get('/playeras', function () {
    return view('productos.playeras');
});

Route::get('/sudaderas', function () {
    return view('productos.sudaderas');
});

Route::get('/tazas', function () {
    return view('productos.tazas');
});

Route::get('/gorras', function () {
    return view('productos.gorras');
});

Route::get('/lonas', function () {
    return view('productos.lonas');
});

Route::get('/tarjetas', function () {
    return view('productos.tarjetas');
});

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

/*
|--------------------------------------------------------------------------
| Rutas de CLIENTE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'cliente'])->group(function () {
    Route::get('/cliente', function () {
        return view('cliente.bienvenida');
    })->name('cliente.bienvenida');

    Route::middleware('auth')->post('/cotizacion-web', [FrontendCotizacionController::class, 'store'])
        ->name('cotizacion.web.store');

    Route::middleware('auth')->get('/cotizar/{id}', function($id){
        $producto = DB::table('productos')->where('id_producto', $id)->first();
        return view('cotizar', compact('producto'));
    })->name('cotizar');
});

/*
|--------------------------------------------------------------------------
| Rutas de ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/inicio', function () {
        return view('inicio.inicio', [
            'usuarios' => DB::table('usuarios')->count(),
            'productos' => DB::table('productos')->count(),
            'cotizaciones' => DB::table('cotizaciones')->count(),
            'produccion' => DB::table('registro_produccion')->count(),
        ]);
    })->name('admin.inicio');

    Route::resource('usuarios', UsuarioController::class);
    Route::resource('proveedores', ProveedorController::class)->parameters(['proveedores' => 'proveedor']);
    Route::resource('productos', ProductoController::class);
    Route::resource('cotizaciones', CotizacionController::class);
    Route::resource('detalle_cotizaciones', DetalleCotizacionController::class);
    Route::resource('registro_producciones', RegistroProduccionController::class);
    Route::resource('entradainventarios', EntradaInventarioController::class);
});

/*
|--------------------------------------------------------------------------
| Rutas de autenticación (Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';