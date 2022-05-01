<?php

namespace App\Http\Controllers;

use App\Models\Acciones;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = Acciones::where('idusuario', Auth::user()->id)->with('user')->with('paciente')
        ->orderBy('id', 'DESC')
        ->paginate(10);

        // dd(json_decode(json_encode($bitacoras)));

        return view('bitacora.index', compact('bitacoras'));
    }
}
