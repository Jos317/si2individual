<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Receta extends Model
{
    use HasFactory;
    protected $table = 'receta';
    protected $fillable = ['conclusion', 'idconsulta'];
    public $timestamps = true;

    public function consulta(){
        return $this->belongsTo('App\Models\Consulta','idconsulta','id');
    }

    public function tratamiento()
    {
        return $this->hasMany('App\Models\Tratamiento','idreceta','id');
    }

    public static function store_receta(Request $request){
        $receta = new Receta();
        $receta->conclusion = $request->conclusion;
        $receta->idconsulta = $request->idconsulta;
        $receta->save();
    }

    public static function update_receta(Request $request){
        $receta = Receta::findOrFail($request->id);
        $receta->conclusion = $request->conclusion;
        $receta->idconsulta = $request->idconsulta;
        $receta->update();
    }
}
