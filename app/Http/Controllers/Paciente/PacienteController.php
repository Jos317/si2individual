<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
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
        $pacientes = Paciente::where('id', Auth::guard('paciente')->user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('layoutPaciente.paciente.index', compact('pacientes'));
    }

    public function edit($id)
    {
        $paciente = Paciente::find($id);
        return view('layoutPaciente.paciente.edit', compact('paciente'));
    }

    public function update(Request $request)
    {
        $this->updateValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            Paciente::update_paciente($request);
            DB::commit();
            return redirect('pacientesP')->with(['message' => 'Paciente actualizado exitosamente!!']);
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
        return view('layoutPaciente.infoadicional.create', compact('paciente'));
    }

    public function ver($id)
    {
        $infoadicional = Infoadicional::where('idpaciente', $id)->first();
        // dd(json_decode(json_encode($infoadicional)));
        return view('layoutPaciente.infoadicional.ver', compact('infoadicional'));
    }

    public function store_adicional(Request $request)
    {
        try {
            DB::beginTransaction();
            Infoadicional::store_infoadicional($request);
            DB::commit();
            return redirect()->to('pacientesP')->with('message', 'Información adicional agregado exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit_adicional($id)
    {
        $infoadicional = Infoadicional::find($id);
        return view('layoutPaciente.infoadicional.edit', compact('infoadicional'));
    }

    public function update_adicional(Request $request)
    {
        // dd(json_decode(json_encode($request->all())));
        try {
            DB::beginTransaction();
            Infoadicional::update_infoadicional($request);
            DB::commit();
            return redirect('pacientesP')->with(['message' => 'Información adicional actualizado exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

}
