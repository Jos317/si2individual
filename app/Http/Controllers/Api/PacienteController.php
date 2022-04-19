<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (! $token = auth('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
            }
            $paciente = auth('api')->user();

            $bitacora = new Bitacora();
            $bitacora->accion = 'Inició Sesión';
            $bitacora->nombre_implicado = $paciente->nombre;
            $bitacora->idusuario = $paciente->id;
            $bitacora->save();

            return $this->respondWithToken($token, $paciente);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }

    // public function me()
    // {
    //     return response()->json(auth()->user());
    // }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Cierre de sesión exitoso'], 200);
    }

    // public function refresh()
    // {
    //     return $this->respondWithToken(auth('api')->refresh());
    // }

    protected function respondWithToken($token, $paciente)
    {
        return response()->json([
            'mensaje' => 'Token generado exitosamente',
            'token' => $token,
            'data' => $paciente
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }

    public function obtenerPacientes()
    {
        try {
            $pacientes = Paciente::get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $pacientes], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
