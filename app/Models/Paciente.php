<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'paciente';
    protected $fillable = ['nombre', 'apellido', 'ci', 'direccion', 'telefono', 'sexo', 'fecha_nac', 'imagen', 'email', 'password'];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
    
    public function historial()
    {
        return $this->hasMany('App\Models\Historial','ipaciente','id');
    }

    public static function store(Request $request){
        $paciente = new Paciente();
        $paciente->ci = $request->ci;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->sexo = $request->sexo;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->fecha_nac = $request->fecha_nac;
        $paciente->email = $request->email;
        $paciente->password = Hash::make($request->password);
        if($request->hasFile('imagen')){
            $extension = $request->imagen->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('paciente', $request->imagen, $nombre);
                $path = 'paciente/' . $nombre;
                $paciente->imagen = $path;
            }
        }
        $paciente->update();
    }

    public static function actualizar(Request $request){
        $paciente = Paciente::findOrFail($request->id);
        $paciente->ci = $request->ci;
        $paciente->nombre = $request->nombre;
        $paciente->sexo = $request->sexo;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->fecha_nac = $request->fecha_nac;
        $paciente->email = $request->email;
        if($request->hasFile('imagen')){
            if($paciente->imagen){
                Storage::disk('public')->delete($paciente->imagen);
            }
            $extension = $request->imagen->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('paciente', $request->imagen, $nombre);
                $path = 'paciente/' . $nombre;
                $paciente->imagen = $path;
            }
        }
        $paciente->update();
    }
}