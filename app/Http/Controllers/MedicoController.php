<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = User::orderBy('id', 'DESC')->paginate(10);
        return view('medico.index', compact('medicos'));
    }

    public function create()
    {
        return view('medico.create');
    }

    public function store(Request $request)
    {
        $this->storeValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            User::store_medico($request);
            DB::commit();
            return redirect()->to('medicos')->with('message', 'Médico agregado exitosamente!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    protected function storeValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email', 'max:255', 'unique:users'],
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
        $medico = User::find($id);
        return view('medico.edit', compact('medico'));
    }

    public function update(Request $request)
    {
        $this->updateValidator($request->all())->validate();
        try {
            DB::beginTransaction();
            User::update_medico($request);
            DB::commit();
            return redirect('medicos')->with(['message' => 'Médico actualizado exitosamente!!']);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(['error' => $e->getMessage()]);
        }
    }

    protected function updateValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($data['id'])],
        ],[
            'email.required' => 'El campo email es requerido.',
            'email.unique' => 'El email que ingresaste no está disponible.',
            'email.max' => 'El email no debe superar los 255 caracteres.',
        ]);
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            User::eliminar($request);
            DB::commit();
            return response()->json(['mensaje' => 'Médico eliminado exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
