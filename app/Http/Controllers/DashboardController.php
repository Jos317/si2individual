<?php

namespace App\Http\Controllers;

use App\Events\NotificacionEvent;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
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
        return view('dashboard.index', ['events' => $events]);
    }

    public function prueba_pusher()
    {
        event(new NotificacionEvent(auth()->user()));
    }
}
