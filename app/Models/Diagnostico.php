<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Diagnostico extends Model
{
    use HasFactory;
    protected $table = 'diagnostico';
    protected $fillable = ['documento', 'nota', 'idpaciente', 'created_at'];
    public $timestamps = true;

    public function consulta(){
        return $this->belongsTo('App\Models\Consulta','idconsulta','id');
    }

    public static function store_diagnostico(Request $request){
        $diagnostico = new Diagnostico();
        if($request->hasFile('documento')){
            $extension = $request->documento->extension();
            if($extension == "docx" || $extension == "pdf"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('diagnostico', $request->documento, $nombre);
                $path = 'storage/diagnostico/' . $nombre;
                $diagnostico->documento = $path;
            }
        }
        $diagnostico->nota = $request->nota;
        $diagnostico->idconsulta = $request->idconsulta;

        $consulta = Consulta::where('id', $request->idconsulta)->first();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Creó ' . $request->nota;
        $bitacora->tabla = 'Diagnóstico';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->idpaciente = $consulta->idpaciente;
        $bitacora->save();

        $historial = new Historial();
        if($request->hasFile('documento')){
            $extension = $request->documento->extension();
            if($extension == "docx" || $extension == "pdf"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('historial', $request->documento, $nombre);
                $path = 'storage/historial/' . $nombre;
                $historial->documento = $path;
            }
        }
        $historial->nota = $request->nota;
        $historial->idpaciente = $consulta->idpaciente;
        $historial->save();

        $diagnostico->save();
    }

    public static function update_diagnostico(Request $request)
    {
        
        $diagnostico = Diagnostico::findOrFail($request->id);
        
        
        if($request->hasFile('documento')){
            if($diagnostico->documento){
                Storage::disk('public')->delete($diagnostico->documento);
            }
            $extension = $request->documento->extension();
            if($extension == "docx" || $extension == "pdf"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('diagnostico', $request->documento, $nombre);
                $path = 'storage/diagnostico/' . $nombre;
                $diagnostico->documento = $path;
            }
        }
        $diagnostico->nota = $request->nota;
        $diagnostico->idconsulta = $request->idconsulta;
        
        $consulta = Consulta::where('id', $request->idconsulta)->first();

        $bitacora = new Bitacora();
        $bitacora->accion = 'Actualizó ' . $request->nota;
        $bitacora->tabla = 'Historial';
        $bitacora->idusuario = Auth::user()->id;
        $bitacora->idpaciente = $consulta->idpaciente;
        $bitacora->save();
        
        $historial = Historial::where('idpaciente', $consulta->idpaciente)->first();
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
        $historial->idpaciente = $consulta->idpaciente;
        $historial->update();
        
        $diagnostico->update();
    }
}
