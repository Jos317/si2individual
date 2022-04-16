<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicoController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('medicos', [MedicoController::class, 'index']);
    Route::get('medico/create', [MedicoController::class, 'create']);
    Route::post('medico/store', [MedicoController::class, 'store']);
    Route::get('medico/edit/{id}', [MedicoController::class, 'edit']);
    Route::post('medico/update', [MedicoController::class, 'update']);
    Route::post('medico/eliminar', [MedicoController::class, 'destroy']);
});
