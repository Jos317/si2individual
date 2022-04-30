<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\Paciente\ConsultaController as PacienteConsultaController;
use App\Http\Controllers\Paciente\DashboardController as PacienteDashboardController;
use App\Http\Controllers\Paciente\HistorialController as PacienteHistorialController;
use App\Http\Controllers\Paciente\PacienteController as PacientePacienteController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('layouts.principal');
    return redirect('dashboard');
});

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::get('loginPaciente', [AuthController::class, 'showLoginPaciente']);
Route::post('loginPaciente', [AuthController::class, 'loginPaciente']);

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('prueba-pusher', [DashboardController::class, 'prueba_pusher']);

    Route::get('medicos', [MedicoController::class, 'index']);
    Route::get('medico/create', [MedicoController::class, 'create']);
    Route::post('medico/store', [MedicoController::class, 'store']);
    Route::get('medico/edit/{id}', [MedicoController::class, 'edit']);
    Route::post('medico/update', [MedicoController::class, 'update']);
    Route::post('medico/eliminar', [MedicoController::class, 'destroy']);
    Route::get('especialidad/index/{id}', [MedicoController::class, 'index_especialidad']);
    Route::get('especialidad/create', [MedicoController::class, 'create_especialidad']);
    Route::post('especialidad/store', [MedicoController::class, 'store_especialidad']);
    Route::get('especialidad/edit/{id}', [MedicoController::class, 'edit_especialidad']);
    Route::post('especialidad/update', [MedicoController::class, 'update_especialidad']);

    Route::get('pacientes', [PacienteController::class, 'index']);
    Route::get('paciente/create', [PacienteController::class, 'create']);
    Route::post('paciente/store', [PacienteController::class, 'store']);
    Route::get('paciente/edit/{id}', [PacienteController::class, 'edit']);
    Route::post('paciente/update', [PacienteController::class, 'update']);
    Route::post('paciente/eliminar', [PacienteController::class, 'destroy']);
    Route::get('paciente/anadir/{id}', [PacienteController::class, 'anadir']);
    Route::get('paciente/ver/{id}', [PacienteController::class, 'ver']);
    Route::post('paciente/store_infoadicional', [PacienteController::class, 'store_adicional']);
    Route::get('paciente/edit_info/{id}', [PacienteController::class, 'edit_adicional']);
    Route::post('paciente/update_info', [PacienteController::class, 'update_adicional']);

    Route::get('historiales', [HistorialController::class, 'index']);
    Route::get('historial/edit/{id}', [HistorialController::class, 'edit']);
    Route::post('historial/update', [HistorialController::class, 'update']);
    Route::get('historial/download/{id}', [HistorialController::class, 'download']);

    Route::get('consultas', [ConsultaController::class, 'index']);
    Route::get('consulta/anadir/{id}', [ConsultaController::class, 'anadir']);
    Route::post('receta/store', [ConsultaController::class, 'store']);
    Route::get('receta/ver/{id}', [ConsultaController::class, 'ver']);
    Route::get('receta/edit/{id}', [ConsultaController::class, 'edit']);
    Route::post('receta/update', [ConsultaController::class, 'update']);
    Route::get('informacion/anadir/{id}', [ConsultaController::class, 'anadir_informacion']);
    Route::post('informacion/store', [ConsultaController::class, 'store_informacion']);
    Route::get('informacion/ver/{id}', [ConsultaController::class, 'ver_informacion']);
    Route::get('informacion/edit/{id}', [ConsultaController::class, 'edit_informacion']);
    Route::post('informacion/update', [ConsultaController::class, 'update_informacion']);
    Route::get('diagnostico/ver/{id}', [ConsultaController::class, 'index_diagnostico']);
    Route::get('diagnostico/create/{id}', [ConsultaController::class, 'crear_diagnostico']);
    Route::post('diagnostico/store', [ConsultaController::class, 'store_diagnostico']);
    Route::get('diagnostico/download/{id}', [ConsultaController::class, 'download']);
    Route::get('diagnostico/edit/{id}', [ConsultaController::class, 'edit_diagnostico']);
    Route::post('diagnostico/update', [ConsultaController::class, 'update_diagnostico']);

    Route::get('bitacoras', [BitacoraController::class, 'index']);
});

Route::middleware(['auth:paciente'])->group(function () {
    Route::get('logoutP', [AuthController::class, 'logoutP']);
    Route::get('dashboardP', [PacienteDashboardController::class, 'index']);
    // Route::get('prueba-pusher', [DashboardController::class, 'prueba_pusher']);

    Route::get('pacientesP', [PacientePacienteController::class, 'index']);
    Route::get('pacienteP/edit/{id}', [PacientePacienteController::class, 'edit']);
    Route::post('pacienteP/update', [PacientePacienteController::class, 'update']);
    // Route::get('paciente/anadir/{id}', [PacienteController::class, 'anadir']);
    Route::get('pacienteP/ver/{id}', [PacientePacienteController::class, 'ver']);
    Route::post('pacienteP/store_infoadicional', [PacientePacienteController::class, 'store_adicional']);
    Route::get('pacienteP/edit_info/{id}', [PacientePacienteController::class, 'edit_adicional']);
    Route::post('pacienteP/update_info', [PacientePacienteController::class, 'update_adicional']);

    Route::get('historialesP', [PacienteHistorialController::class, 'index']);
    Route::get('historialP/download/{id}', [PacienteHistorialController::class, 'download']);

    Route::get('consultasP', [PacienteConsultaController::class, 'index']);
    Route::post('consultaP/eliminar', [PacienteConsultaController::class, 'destroy']);
    Route::get('recetaP/ver/{id}', [PacienteConsultaController::class, 'ver']);
    Route::get('informacionP/ver/{id}', [PacienteConsultaController::class, 'ver_informacion']);
    Route::get('diagnosticoP/ver/{id}', [PacienteConsultaController::class, 'index_diagnostico']);
    Route::get('diagnosticoP/download/{id}', [PacienteConsultaController::class, 'download']);

    // Route::get('bitacoras', [BitacoraController::class, 'index']);
});
