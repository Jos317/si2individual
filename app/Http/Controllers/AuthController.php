<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showLoginPaciente()
    {
        return view('auth.loginPaciente');
    }

    public function login(Request $request)
    {
        // dd(User::find(1));
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $bitacora = new Bitacora();
            $bitacora->accion = 'Inició Sesión';
            $bitacora->idusuario = Auth::user()->id;
            $bitacora->save();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'error' => 'Por favor verifique sus credenciales!!',
        ]);
    }

    public function logout(Request $request)
    {

        $bitacora = new Bitacora();
        $bitacora->accion = 'Salió Sesión';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->save();

        Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('login');
    }

    public function loginPaciente(Request $request)
    {
        
        if (Auth::guard('paciente')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd(json_decode(json_encode(Auth::guard('paciente')->user()->id)));
            $request->session()->regenerate();

            $bitacora = new Bitacora();
            $bitacora->accion = 'Inició Sesión';
            $bitacora->idpaciente = Auth::guard('paciente')->user()->id;
            $bitacora->save();

            return redirect()->guest('dashboardP');
        }

        return back()->withErrors([
            'error' => 'Por favor verifique sus credenciales!!',
        ]);
    }

    public function logoutP(Request $request)
    {

        $bitacora = new Bitacora();
        $bitacora->accion = 'Salió Sesión';
        $bitacora->idpaciente = Auth::guard('paciente')->user()->id;
        $bitacora->save();

        Auth::logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('loginPaciente');
    }
    
}
