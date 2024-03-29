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
            $consultas = Consulta::join('users', 'consulta.idusuario', 'users.id')
            ->orderBy('id', 'DESC')
            ->select('consulta.id', 'consulta.motivo', 'consulta.inicio', 'consulta.fin', 'consulta.idpaciente', 'users.nombre as medico_nombre')
            ->where('idpaciente', $paciente->id)->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $consultas], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function crearConsulta(Request $request){
        try {
            if($request->motivo){
                $consulta = Consulta::where('inicio', '<=', $request->inicio)->where('fin', '>', $request->inicio)->where('idusuario', $request->idusuario)->first();
                if(!$consulta){
                    DB::beginTransaction();
                    Consulta::crearConsulta($request);
                    DB::commit();
                    return response()->json(['mensaje' => 'Consulta creado exitosamente'], 200);
                }else{
                    throw new \Exception("Ese horario está ocupado");
                }
            }else{
                throw new \Exception("Ingrese el motivo");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function eliminarConsulta(Request $request)
    {
        // dd(json_decode(json_encode($request->all())));
        try {
            DB::beginTransaction();
            Consulta::eliminarMovil($request);
            DB::commit();
            return response()->json(['mensaje' => 'Consulta eliminado exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }
}
