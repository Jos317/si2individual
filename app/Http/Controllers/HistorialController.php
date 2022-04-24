<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HistorialController extends Controller
{
    public function index()
    {
        $consulta = Consulta::where('idusuario', Auth::user()->id)->first();
        $historiales = Historial::join('paciente', 'historial.idpaciente', 'paciente.id')
        ->orderBy('id', 'DESC')
        ->select('historial.id', 'historial.nota', 'historial.documento', 'paciente.nombre as paciente_nombre', 'historial.created_at')
        ->where('idpaciente', $consulta->idpaciente)
        ->paginate(10);

        return view('historial.index', compact('historiales'));
    }

    public function edit($id)
    {
        $historial = Historial::find($id);
        $pacientes = Paciente::get();
        return view('historial.edit', ['historial' => $historial, 'pacientes' => $pacientes]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            Historial::update_historial($request);
            DB::commit();
            return redirect('historiales')->with(['message' => 'Documento actualizado exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function download($id)
    {
        $historial = Historial::find($id);
        // dd(Storage::download($historial->documento));
        // return Storage::url($historial->documento);
        return response()->file($historial->documento);
    }
}
