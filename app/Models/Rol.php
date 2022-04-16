<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'rol';
    protected $fillable = ['nombre', 'idusuario', 'idpaciente'];
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\Models\Users','ipaciente','id');
    }
}
