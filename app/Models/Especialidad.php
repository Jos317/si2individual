<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Especialidad extends Model
{
    use HasFactory;
    protected $table = 'especialidad';
    protected $fillable = ['nombre', 'idusuario'];
    public $timestamps = false;

    public function users(){
        return $this->belongsTo('App\Models\User','idusuario','id');
    }

    public static function store_especialidad(Request $request){
        $especialidad = new Especialidad();
        $especialidad->nombre = $request->nombre;
        $especialidad->idusuario = Auth::user()->id;
        $especialidad->save();
    }

    public static function update_especialidad(Request $request){
        $especialidad = Especialidad::findOrFail($request->id);
        $especialidad->nombre = $request->nombre;
        $especialidad->idusuario = Auth::user()->id;
        $especialidad->update();
    }
}
