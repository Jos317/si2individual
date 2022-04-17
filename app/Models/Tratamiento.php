<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tratamiento extends Model
{
    use HasFactory;
    protected $table = 'tratamiento';
    protected $fillable = ['medicamento', 'instruccion', 'idreceta'];
    public $timestamps = false;

    public function receta(){
        return $this->belongsTo('App\Models\Receta','idconsulta','id');
    }

    public static function store_receta(Request $request){
        $tratamiento = new Tratamiento();
        $tratamiento->medicamento = $request->medicamento;
        $tratamiento->instruccion = $request->instruccion;
        $tratamiento->idreceta = $request->idreceta;
        $tratamiento->save();
    }

    public static function update_receta(Request $request){
        $tratamiento = Receta::findOrFail($request->id);
        $tratamiento->medicamento = $request->medicamento;
        $tratamiento->instruccion = $request->instruccion;
        $tratamiento->idreceta = $request->idreceta;
        $tratamiento->update();
    }
}
