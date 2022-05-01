<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Informacion extends Model
{
    use HasFactory;
    protected $table = 'informacion';
    protected $fillable = ['peso', 'estatura', 'frecu_cardi', 'frecu_respi', 'temperatura', 'sistolica', 'diastolica', 'idconsulta'];
    public $timestamps = false;

    public function consulta(){
        return $this->belongsTo('App\Models\Consulta','idconsulta','id');
    }

    public static function store_informacion(Request $request){
        $informacion = new Informacion();
        $informacion->peso = $request->peso ?? '';
        $informacion->estatura = $request->estatura ?? '';
        $informacion->frecu_cardi = $request->frecu_cardi ?? '';
        $informacion->frecu_respi = $request->frecu_respi ?? '';
        $informacion->temperatura = $request->temperatura ?? '';
        $informacion->sistolica = $request->sistolica ?? '';
        $informacion->diastolica = $request->diastolica ?? '';
        $informacion->idconsulta = $request->idconsulta;

        $consulta = Consulta::findOrFail($request->idconsulta);
        $consulta->estado_i = 1;
        $consulta->update();

        $bitacora = new Acciones();
        $bitacora->accion = 'Creó';
        $bitacora->tabla = 'Información';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->idpaciente = $consulta->idpaciente;
        $bitacora->save();

        $informacion->save();
    }

    public static function update_informacion(Request $request){
        $informacion = Informacion::where('idconsulta', $request->idconsulta)->first();
        $informacion->peso = $request->peso ?? '';
        $informacion->estatura = $request->estatura ?? '';
        $informacion->frecu_cardi = $request->frecu_cardi ?? '';
        $informacion->frecu_respi = $request->frecu_respi ?? '';
        $informacion->temperatura = $request->temperatura ?? '';
        $informacion->sistolica = $request->sistolica ?? '';
        $informacion->diastolica = $request->diastolica ?? '';
        $informacion->idconsulta = $request->idconsulta;

        $consulta = Consulta::findOrFail($request->idconsulta);

        $bitacora = new Acciones();
        $bitacora->accion = 'Actualizó';
        $bitacora->tabla = 'Información';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->idpaciente = $consulta->idpaciente;
        $bitacora->save();

        $informacion->update();
    }
}
