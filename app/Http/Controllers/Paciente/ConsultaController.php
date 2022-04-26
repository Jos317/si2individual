<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Diagnostico;
use App\Models\Informacion;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::join('paciente', 'consulta.idpaciente', 'paciente.id')
        ->orderBy('id', 'DESC')
        ->select('consulta.id', 'consulta.motivo', 'consulta.inicio', 'consulta.fin', 'paciente.nombre as paciente_nombre', 'consulta.estado','consulta.estado_i')
        ->where('idpaciente', Auth::guard('paciente')->user()->id)
        ->paginate(10);

        return view('layoutPaciente.consulta.index', compact('consultas'));
    }

    public function ver($id)
    {
        $receta = Receta::where('idconsulta', $id)->first();
        // dd(json_decode(json_encode($receta)));
        return view('layoutPaciente.receta.ver', compact('receta'));
    }

    public function ver_informacion($id)
    {
        $informacion = Informacion::where('idconsulta', $id)->first();
        // dd(json_decode(json_encode($receta)));
        return view('layoutPaciente.informacion.ver', compact('informacion'));
    }

    public function index_diagnostico($id)
    {
        $diagnosticos = Diagnostico::select('diagnostico.id', 'diagnostico.documento','diagnostico.nota', 'diagnostico.created_at', 'diagnostico.idconsulta')
        ->where('diagnostico.idconsulta', $id)
        ->orderBy('id', 'DESC')
        ->paginate(10);
        
        return view('layoutPaciente.diagnostico.index', compact('diagnosticos'));
    }

    public function download($id)
    {
        $diagnostico = Diagnostico::find($id);
        // dd(Storage::download($historial->documento));
        // return Storage::url($historial->documento);
        return response()->file($diagnostico->documento);
    }
}
