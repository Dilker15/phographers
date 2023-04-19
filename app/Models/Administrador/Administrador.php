<?php

namespace App\Models\Administrador;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;


    protected $table='administradores';
    protected $fillable = [
        'nombre',
        'sexo',
        'email',
        'tipo',
        'apellidos',
        'foto_perfil'
    ];
}
