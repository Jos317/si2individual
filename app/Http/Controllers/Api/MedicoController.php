<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function obtenerMedicos()
    {
        try {
            $medicos = User::select('id', 'nombre')->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $medicos], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
