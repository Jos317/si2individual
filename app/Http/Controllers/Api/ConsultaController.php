<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function obtenerConsultas()
    {
        try {
            $paciente = auth('api')->user();
            $consultas = Consulta::select('id', 'motivo', 'inicio', 'fin', 'idusuario', 'idpaciente')->where('idpaciente', $paciente->id)->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $consultas], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function crearConsulta(Request $request){
        try {
            $consulta = Consulta::where('inicio', '<=', $request->inicio)->where('fin', '>', $request->inicio)->where('idusuario', $request->idusuario)->first();
            if(!$consulta){
                DB::beginTransaction();
                Consulta::crearConsulta($request);
                DB::commit();
                return response()->json(['mensaje' => 'Consulta creado exitosamente'], 200);
            }else{
                throw new \Exception("Ese horario está ocupado");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
