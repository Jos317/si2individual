<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Historial;
use App\Models\Infoadicional;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PacienteController extends Controller
{
    public function index()
    {
        $consultas = Consulta::where('idusuario', Auth::user()->id)->select('idpaciente')->get();
        $array = [];
        foreach ($consultas as $consulta) {
            array_push($array, $consulta["idpaciente"]);
        }
        $pacientes = Paciente::whereIn('id', $array)->orderBy('id', 'DESC')->paginate(10);
        
        return view('paciente.index', compact('pacientes'));
    }

    public function create()
    {
        return view('paciente.create');
    }

    public function store(Request $request)
    {
        $this->storeValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Paciente::store_paciente($request);
            DB::commit();
            return redirect()->to('pacientes')->with('message', 'Paciente agregado exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    protected function storeValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email', 'max:255', 'unique:paciente'],
            'password' => ['required'],
        ],[
            'email.required' => 'El campo email es requerido.',
            'email.unique' => 'El email que ingresaste no está disponible.',
            'email.max' => 'El email no debe superar los 255 caracteres.',
            'password.required' => 'El campo contraseña es requerido.',
        ]);
    }

    public function edit($id)
    {
        $paciente = Paciente::find($id);
        return view('paciente.edit', compact('paciente'));
    }

    public function update(Request $request)
    {
        $this->updateValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Paciente::update_paciente($request);
            DB::commit();
            return redirect('pacientes')->with(['message' => 'Paciente actualizado exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    protected function updateValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email', 'max:255', Rule::unique('paciente')->ignore($data['id'])],
        ],[
            'email.required' => 'El campo email es requerido.',
            'email.unique' => 'El email que ingresaste no está disponible.',
            'email.max' => 'El email no debe superar los 255 caracteres.',
        ]);
    }

    // public function destroy(Request $request)
    // {
    //     try {
    //         DB::beginTransaction();
    //         Paciente::eliminar($request);
    //         DB::commit();
    //         return response()->json(['mensaje' => 'Paciente eliminado exitosamente'], 200);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json(['mensaje' => $e->getMessage()], 500);
    //     }
    // }

    public function anadir($id)
    {
        $paciente = Paciente::where('id', $id)->first();
        return view('infoadicional.create', compact('paciente'));
    }

    public function ver($id)
    {
        $infoadicional = Infoadicional::where('idpaciente', $id)->first();
        // dd(json_decode(json_encode($infoadicional)));
        return view('infoadicional.ver', compact('infoadicional'));
    }

    public function store_adicional(Request $request)
    {
        try {
            DB::beginTransaction();
            Infoadicional::store_infoadicional($request);
            DB::commit();
            return redirect()->to('pacientes')->with('message', 'Información adicional agregado exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit_adicional($id)
    {
        $infoadicional = Infoadicional::find($id);
        return view('infoadicional.edit', compact('infoadicional'));
    }

    public function update_adicional(Request $request)
    {
        // dd(json_decode(json_encode($request->all())));
        try {
            DB::beginTransaction();
            Infoadicional::update_infoadicional($request);
            DB::commit();
            return redirect('pacientes')->with(['message' => 'Información adicional actualizado exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function index_historial($id)
    {
        $historiales = Historial::select('historial.id', 'historial.documento','historial.nota', 'historial.created_at', 'historial.idpaciente')
        ->where('historial.idpaciente', $id)
        ->orderBy('id', 'DESC')
        ->paginate(10);
        
        return view('historial.index', ['id' => $id], compact('historiales'));
    }

    public function download($id)
    {
        $historial = Historial::find($id);
        // dd(Storage::download($historial->documento));
        // return Storage::url($historial->documento);
        return response()->file($historial->documento);
    }

    public function edit_historial($id)
    {
        $historial = Historial::where('id', $id)->first();
        return view('historial.edit', compact('historial'));
    }

    public function update_historial(Request $request)
    {
        
        // $this->updateValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Historial::update_historial($request);
            DB::commit();
            return redirect('consultas')->with(['message' => 'Historial actualizada exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

}
