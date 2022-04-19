<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'consulta';
    protected $fillable = ['motivo', 'fecha_registro', 'hora_inicio', 'hora_fin', 'idusuario','idpaciente'];
    public $timestamps = false;

    public function receta()
    {
        return $this->hasOne('App\Models\Receta','idconsulta','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','idusuario','id');
    }

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente','idpaciente','id');
    }

    public static function store_consulta(Request $request){
        $consulta = new Consulta();
        $consulta->motivo = $request->motivo;
        $consulta->fecha_registro = $request->fecha_registro;
        $consulta->hora_inicio = $request->hora_inicio;
        $consulta->hora_fin = $request->hora_fin;
        $consulta->idusuario = $request->idusuario; 
        $consulta->idpaciente= $request->idpaciente;
        $consulta->save();
    }

    public static function update_consulta(Request $request){
        $consulta = Consulta::findOrFail($request->id);
        $consulta->motivo = $request->motivo;
        $consulta->fecha_registro = $request->fecha_registro;
        $consulta->hora_inicio = $request->hora_inicio;
        $consulta->hora_fin = $request->hora_fin;
        $consulta->idusuario = $request->idusuario; 
        $consulta->idpaciente= $request->idpaciente;
        $consulta->update();
    }
}
