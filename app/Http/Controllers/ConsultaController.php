<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::join('paciente', 'consulta.idpaciente', 'paciente.id')
        ->orderBy('id', 'DESC')
        ->select('consulta.id', 'consulta.motivo', 'consulta.fecha_registro', 'consulta.hora_inicio', 'consulta.hora_fin', 'paciente.nombre as paciente_nombre')
        ->paginate(10);

        return view('consulta.index', compact('consultas'));
    }

    public function anadir($id)
    {
        $consulta = Consulta::where('id', $id)->first();
        return view('receta.create', compact('consulta'));
    }

    public function store(Request $request)
    {
        $this->storeValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Receta::store_receta($request);
            DB::commit();
            return redirect()->to('consultas')->with('message', 'Receta agregado exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    protected function storeValidator(array $data)
    {
        return Validator::make($data, [
            'conclusion' => ['required'],
        ],[
            'conclusion.required' => 'El campo conclusion es requerido.',
        ]);
    }

    public function ver($id)
    {
        $receta = Receta::where('id', $id)->first();
        return view('receta.ver', compact('receta'));
    }

    public function edit($id)
    {
        $receta = Receta::find($id);
        return view('receta.edit', compact('receta'));
    }

    public function update(Request $request)
    {
        // dd(json_decode(json_encode($request->all())));
        $this->updateValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Receta::update_receta($request);
            DB::commit();
            return redirect('consultas')->with(['message' => 'Receta actualizado exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    protected function updateValidator(array $data)
    {
        return Validator::make($data, [
            'conclusion' => ['required'],
        ],[
            'conclusion.required' => 'El campo conclusion es requerido.',
        ]);
    }
}
