<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Historial extends Model
{
    use HasFactory;
    protected $table = 'historial';
    protected $fillable = ['documento', 'nota', 'idpaciente', 'created_at'];
    public $timestamps = true;

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente','idpaciente','id');
    }

    public static function update_historial(Request $request)
    {
        $historial = Historial::findOrFail($request->id);
        if($request->hasFile('documento')){
            if($historial->documento){
                Storage::disk('public')->delete($historial->documento);
            }
            $extension = $request->documento->extension();
            if($extension == "docx" || $extension == "pdf"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('historial', $request->documento, $nombre);
                $path = 'storage/historial/' . $nombre;
                $historial->documento = $path;
            }
        }
        $historial->nota = $request->nota;
        $historial->idpaciente = $request->idpaciente;

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizó ' . $request->nota;
        $bitacora->tabla = 'Historial';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->idpaciente = $request->idpaciente;
        $bitacora->save();

        $historial->update();
    }
}
