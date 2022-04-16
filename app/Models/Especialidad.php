<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Especialidad extends Model
{
    use HasFactory;
    protected $table = 'especialidad';
    protected $fillable = ['nombre', 'idusuario'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User','idusuario','id');
    }

    public static function store(Request $request){
        $especialidad = new Especialidad();
        $especialidad->nombre = $request->nombre;
        $especialidad->idusuario = $request->idusuario;
        $especialidad->save();
    }

    public static function actualizar(Request $request){
        $especialidad = Especialidad::findOrFail($request->id);
        $especialidad->nombre = $request->nombre;
        $especialidad->idusuario = $request->idusuario;
        $especialidad->update();
    }
}
