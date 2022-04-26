<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    public function index()
    {
        $historiales = Historial::join('paciente', 'historial.idpaciente', 'paciente.id')
        ->orderBy('id', 'DESC')
        ->select('historial.id', 'historial.nota', 'historial.documento', 'paciente.nombre as paciente_nombre', 'historial.created_at')
        ->where('idpaciente', Auth::guard('paciente')->user()->id)
        ->paginate(10);

        return view('layoutPaciente.historial.index', compact('historiales'));
    }

    public function download($id)
    {
        $historial = Historial::find($id);
        // dd(Storage::download($historial->documento));
        // return Storage::url($historial->documento);
        return response()->file($historial->documento);
    }
}
