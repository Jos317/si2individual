<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    public function login(Request $request){
        try {
            $paciente = Paciente::where('email', $request->email)->where('estado', 0)->first();
            if($paciente)
            {
                if(Hash::check($request->password, $paciente->password)){
                    return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $paciente], 200);
                }else{
                    throw new \Exception("Contraseña incorrecta");
                }
            }else{
                throw new \Exception("Ese usuario no existe");
            }
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
