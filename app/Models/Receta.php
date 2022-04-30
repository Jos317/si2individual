<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Receta extends Model
{
    use HasFactory;
    protected $table = 'receta';
    protected $fillable = ['medicamento', 'tratamiento', 'conclusion', 'idconsulta'];
    public $timestamps = true;

    public function consulta(){
        return $this->belongsTo('App\Models\Consulta','idconsulta','id');
    }

    public static function store_receta(Request $request){
        // dd(json_decode(json_encode($request->conclusion)));
        $receta = new Receta();
        $receta->medicamento = $request->medicamento??'';
        $receta->tratamiento = $request->tratamiento??'';
        $receta->conclusion = $request->conclusion;
        $receta->idconsulta = $request->idconsulta;

        $consulta = Consulta::findOrFail($request->idconsulta);
        $consulta->estado = 1;
        $consulta->update();


        $bitacora = new Bitacora();
        $bitacora->accion = 'Creó';
        $bitacora->tabla = 'Receta';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->idpaciente = $consulta->idpaciente;
        $bitacora->save();

        $receta->save();
    }

    public static function update_receta(Request $request){
        $receta = Receta::findOrFail($request->id);
        // dd(json_decode(json_encode($receta)));
        $receta->medicamento = $request->medicamento??'';
        $receta->tratamiento = $request->tratamiento??'';
        $receta->conclusion = $request->conclusion;
        $receta->idconsulta = $request->idconsulta;
        $receta->update();

        $consulta = Consulta::findOrFail($request->idconsulta);

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizó';
        $bitacora->tabla = 'Receta';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->idpaciente = $consulta->idpaciente;
        $bitacora->save();
    }
}
