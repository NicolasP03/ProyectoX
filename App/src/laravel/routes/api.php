<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModeloReservaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí defines las rutas que usarán Postman o cualquier cliente HTTP.
|
*/

// CRUD completo de reservas
Route::apiResource('reservas', ModeloReservaController::class);

// Ejemplo adicional: puedes tener ruta de prueba
Route::get('/ping', function () {
    return response()->json(['message' => 'API funcionando 🟢']);
});
