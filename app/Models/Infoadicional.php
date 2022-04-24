<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Infoadicional extends Model
{
    use HasFactory;
    protected $table = 'infoadicional';
    protected $fillable = ['alergia', 'ante_here_fami', 'ante_no_pato', 'ante_pato', 'ante_psiqui', 'dieta_nutri', 'idpaciente'];
    public $timestamps = false;

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente','idpaciente','id');
    }

    public static function store_infoadicional(Request $request){
        $info_adicional = new Infoadicional();
        $info_adicional->alergia = $request->alergia ?? '';
        $info_adicional->ante_here_fami = $request->ante_here_fami ?? '';
        $info_adicional->ante_no_pato = $request->ante_no_pato ?? '';
        $info_adicional->ante_pato = $request->ante_pato ?? '';
        $info_adicional->ante_psiqui = $request->ante_psiqui ?? ''; 
        $info_adicional->dieta_nutri = $request->dieta_nutri ?? '';
        $info_adicional->idpaciente = $request->idpaciente;

        $paciente = Paciente::findOrFail($request->idpaciente);
        $paciente->estado = 1;
        $paciente->update();

        $info_adicional->save();
    }

    public static function update_infoadicional(Request $request){
        $info_adicional = Infoadicional::where('idpaciente', $request->idpaciente)->first();
        $info_adicional->alergia = $request->alergia ?? '';
        $info_adicional->ante_here_fami = $request->ante_here_fami ?? '';
        $info_adicional->ante_no_pato = $request->ante_no_pato ?? '';
        $info_adicional->ante_pato = $request->ante_pato ?? '';
        $info_adicional->ante_psiqui = $request->ante_psiqui ?? ''; 
        $info_adicional->dieta_nutri = $request->dieta_nutri ?? '';
        $info_adicional->idpaciente = $request->idpaciente;
        $info_adicional->update();
    }

}
