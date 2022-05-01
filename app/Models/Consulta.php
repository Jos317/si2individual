<?php

namespace App\Models;

use App\Events\NotificacionEvent;
use App\Events\NotificacionPaciente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'consulta';
    protected $fillable = ['motivo', 'inicio', 'fin', 'idusuario','idpaciente'];
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

    public function informacion()
    {
        return $this->hasOne('App\Models\Informacion','idconsulta','id');
    }

    public function diagnostico()
    {
        return $this->hasMany('App\Models\Diagnostico','idconsulta','id');
    }

    public static function crearConsulta(Request $request){
        $consulta = new Consulta();
        $consulta->motivo = $request->motivo;
        $consulta->inicio = $request->inicio;
        $consulta->fin = $request->fin;
        $consulta->idusuario = $request->idusuario; 
        $consulta->idpaciente= auth('api')->user()->id;
        $consulta->save();

        $consulta = Consulta::find($consulta->id)->load('user', 'paciente');
        event(new NotificacionEvent($consulta));
        event(new NotificacionPaciente($consulta));
    }

    public static function eliminar(Request $request)
    {
        $banner = Consulta::findOrFail($request->id);
        $banner->delete();
    }

    public static function eliminarMovil(Request $request)
    {
        $banner = Consulta::findOrFail($request->id);
        $banner->delete();
    }
}
