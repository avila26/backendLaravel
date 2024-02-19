<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TipoPersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('tipoP',                  [TipoPersonaController::class, 'index']);
Route::post('persona',               [PersonaController::class, 'store']);
Route::get('persona/{tipo}',         [PersonaController::class, 'buscarPorCTipo']);
Route::post('cita',                  [CitaController::class, 'reservarCita']);
Route::get('cita',                  [CitaController::class, 'index']);
