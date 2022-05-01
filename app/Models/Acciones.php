<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acciones extends Model
{
    use HasFactory;
    protected $table = 'bitacora';
    protected $fillable = ['accion', 'tabla','idusuario', 'idpaciente', 'created_at'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\Models\User','idusuario','id');
    }

    
    public function paciente(){
        return $this->belongsTo('App\Models\Paciente','idpaciente','id');
    }
}