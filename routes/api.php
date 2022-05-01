<?php

use App\Http\Controllers\Api\ConsultaController;
use App\Http\Controllers\Api\MedicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [PacienteController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function (){
    Route::get('obtenerPaciente', [PacienteController::class, 'obtenerPaciente']);
    Route::get('obtenerMedicos', [MedicoController::class, 'obtenerMedicos']);
    Route::get('obtenerConsultas', [ConsultaController::class, 'obtenerConsultas']);
    Route::post('crearConsulta', [ConsultaController::class, 'crearConsulta']);
    Route::post('eliminarConsulta', [ConsultaController::class, 'eliminarConsulta']);
});
