<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\ClientsController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Checkea si la API está funcionando
Route::get('/health', [HealthController::class, 'check']);

// CRUD de clientes

// Route::apiResource('clients', ClientsController::class);

// Crea un cliente
Route::post('v1/clients', [ClientsController::class, 'store']);

// Extrae a todos los clientes
Route::get('v1/clients', [ClientsController::class, 'index']);

// Extrae a un cliente por id
Route::get('v1/clients/{id}', [ClientsController::class, 'show']);

// Actualiza un cliente por id
Route::put('v1/clients/{id}', [ClientsController::class, 'update']);

// Elimina un cliente por id
Route::delete('v1/clients/{id}', [ClientsController::class, 'destroy']);

