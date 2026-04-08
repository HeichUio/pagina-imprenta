<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Modo mantenimiento
if (file_exists($maintenance = __DIR__.'/laravel/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Autoload de Composer
require __DIR__.'/laravel/vendor/autoload.php';

// Arranque de Laravel
(require_once __DIR__.'/laravel/bootstrap/app.php')
    ->handleRequest(Request::capture());