<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Diagnostico;
use App\Models\Informacion;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::join('paciente', 'consulta.idpaciente', 'paciente.id')
        ->orderBy('id', 'DESC')
        ->select('consulta.id', 'consulta.motivo', 'consulta.inicio', 'consulta.fin', 'paciente.nombre as paciente_nombre', 'consulta.estado','consulta.estado_i')
        ->where('idusuario', Auth::user()->id)
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
        $receta = Receta::where('idconsulta', $id)->first();
        // dd(json_decode(json_encode($receta)));
        return view('receta.ver', compact('receta'));
    }

    public function edit($id)
    {
        $receta = Receta::where('idconsulta', $id)->first();
        return view('receta.edit', compact('receta'));
    }

    public function update(Request $request)
    {
        $this->updateValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            // dd(json_decode(json_encode($request->all())));
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

    public function anadir_informacion($id)
    {
        $consulta = Consulta::where('id', $id)->first();
        return view('informacion.create', compact('consulta'));
    }

    public function store_informacion(Request $request)
    {
        // $this->storeValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Informacion::store_informacion($request);
            DB::commit();
            return redirect()->to('consultas')->with('message', 'Información agregado exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function ver_informacion($id)
    {
        $informacion = Informacion::where('idconsulta', $id)->first();
        // dd(json_decode(json_encode($receta)));
        return view('informacion.ver', compact('informacion'));
    }

    public function edit_informacion($id)
    {
        $informacion = Informacion::where('idconsulta', $id)->first();
        return view('informacion.edit', compact('informacion'));
    }

    public function update_informacion(Request $request)
    {
        // dd(json_decode(json_encode($request->all())));
        // $this->updateValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Informacion::update_informacion($request);
            DB::commit();
            return redirect('consultas')->with(['message' => 'Informacion actualizado exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function index_diagnostico($id)
    {
        $diagnosticos = Diagnostico::select('diagnostico.id', 'diagnostico.documento','diagnostico.nota', 'diagnostico.created_at', 'diagnostico.idconsulta')
        ->where('diagnostico.idconsulta', $id)
        ->orderBy('id', 'DESC')
        ->paginate(10);
        
        return view('diagnostico.index', ['id' => $id], compact('diagnosticos'));
    }

    public function crear_diagnostico($id)
    {
        return view('diagnostico.create', ['id' => $id]);
    }

    public function store_diagnostico(Request $request)
    {
        // $this->storeValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Diagnostico::store_diagnostico($request);
            DB::commit();
            return redirect()->to('consultas')->with('message', 'Diagnostico agregado exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function download($id)
    {
        $diagnostico = Diagnostico::find($id);
        // dd(Storage::download($historial->documento));
        // return Storage::url($historial->documento);
        return response()->file($diagnostico->documento);
    }

    public function edit_diagnostico($id)
    {
        $diagnostico = Diagnostico::where('id', $id)->first();
        return view('diagnostico.edit', compact('diagnostico'));
    }

    public function update_diagnostico(Request $request)
    {
        
        // $this->updateValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Diagnostico::update_diagnostico($request);
            DB::commit();
            return redirect('consultas')->with(['message' => 'Diagnóstico actualizado exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
