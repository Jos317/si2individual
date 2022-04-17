<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Historial extends Model
{
    use HasFactory;
    protected $table = 'historial';
    protected $fillable = ['documento', 'nota', 'fecha_registro', 'idpaciente'];
    public $timestamps = false;

    public static function store_historial(Request $request){
        $historial = new Historial();
        if($request->hasFile('documento')){
            $extension = $request->documento->extension();
            if($extension == "docx" || $extension == "zip" || $extension == "rar" || $extension == "7zip"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('historial', $request->documento, $nombre);
                $path = 'historial/' . $nombre;
                $historial->documentos = $path;
            }
        }
        $historial->nota = $request->nota ?? '';
        $historial->fecha_registro = $request->fecha_registro;
        $historial->idpaciente = $request->idpaciente;
        $historial->save();
    }

    public static function update_medico(Request $request)
    {
        $historial = Historial::findOrFail($request->id);
        if($request->hasFile('documento')){
            if($historial->documento){
                Storage::disk('public')->delete($historial->documento);
            }
            $extension = $request->documento->extension();
            if($extension == "docx" || $extension == "zip" || $extension == "rar" || $extension == "7zip"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('historial', $request->documento, $nombre);
                $path = 'historial/' . $nombre;
                $historial->documento = $path;
            }
        }
        $historial->nota = $request->nota ?? '';
        $historial->fecha_registro = $request->fecha_registro;
        $historial->idpaciente = $request->idpaciente;
        $historial->update();
    }
}
