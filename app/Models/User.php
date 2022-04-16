<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'ci',
        'direccion',
        'telefono',
        'biografia',
        'email',
        'password',
        'imagen',
        'estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function store_medico(Request $request)
    {
        $medico = new User();
        $medico->nombre = $request->nombre;
        $medico->ci = $request->ci;
        $medico->direccion = $request->direccion;
        $medico->telefono = $request->telefono;
        $medico->biografia = $request->biografia ?? '';
        $medico->email = $request->email;
        $medico->password = Hash::make($request->password);
        if($request->hasFile('imagen')){
            $extension = $request->imagen->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('medico', $request->imagen, $nombre);
                $path = 'storage/medico/' . $nombre;
                $medico->imagen = $path;
            }
        }
        $medico->save();
    }

    public static function update_medico(Request $request)
    {
        $medico = User::findOrFail($request->id);
        $medico->nombre = $request->nombre;
        $medico->ci = $request->ci;
        $medico->direccion = $request->direccion;
        $medico->telefono = $request->telefono;
        $medico->biografia = $request->biografia ?? '';
        $medico->email = $request->email;
        if($request->password != "")
        {
            $medico->password = Hash::make($request->password);
        }
        if($request->hasFile('imagen')){
            $extension = $request->imagen->extension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $nombre = round(microtime(true)) . '.' . $extension;
                Storage::disk('public')->putFileAs('medico', $request->imagen, $nombre);
                $path = 'storage/medico/' . $nombre;
                $medico->imagen = $path;
            }
        }
        $medico->update();
    }

    public static function eliminar(Request $request)
    {
        $banner = User::findOrFail($request->id);
        $banner->estado = 1;
        $banner->update();
    }
}
