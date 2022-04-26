<?php

namespace App\Http\Controllers\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $events = array();
        $consultas = Consulta::where('idpaciente', Auth::guard('paciente')->user()->id)->get();
        foreach($consultas as $consulta) {
            $events[] = [
                'title' => $consulta->motivo,
                'start' => $consulta->inicio,
                'end' => $consulta->fin,
            ];
        }
        return view('layoutPaciente.dashboard.index', ['events' => $events]);
    }
}
