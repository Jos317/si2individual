<?php

namespace App\Http\Controllers;

use App\Events\NotificacionEvent;
use App\Events\NotificacionPaciente;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $events = array();
        $consultas = Consulta::where('idusuario', Auth::user()->id)->get();
        foreach($consultas as $consulta) {
            $events[] = [
                'title' => $consulta->motivo,
                'start' => $consulta->inicio,
                'end' => $consulta->fin,
            ];
        }
        if($request->ajax()){
            return response()->json(['events' => $events], 200);
        }else{
            return view('dashboard.index', ['events' => $events]);
        }
    }

    public function prueba_pusher()
    {
        // event(new NotificacionEvent(auth()->user()));
        $consulta = Consulta::find(1)->load('user', 'paciente');
        event(new NotificacionEvent($consulta));
        event(new NotificacionPaciente($consulta));
    }
}
