<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\DetalleCotizacionController;
use App\Http\Controllers\Api\CotizacionController;


Route::post('/cotizaciones', [CotizacionController::class, 'store']);


Route::get('/cotizaciones/usuario/{id}', [CotizacionController::class, 'cotizacionesPorUsuario']);


Route::get('/cotizaciones/{id}', [CotizacionController::class, 'show']);



Route::post('/detalle-cotizacion', [DetalleCotizacionController::class, 'store']);



Route::get('/productos', [ProductoController::class, 'index']);


Route::get('/productos/{id}', [ProductoController::class, 'show']);




Route::get('/users', [UsuarioController::class, 'index']);





Route::post('/register', [AuthController::class, 'register']);


Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});