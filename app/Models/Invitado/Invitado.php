<?php

namespace App\Models\Invitado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;

    protected $table = 'invitados';

    protected $fillable = [
        'nombre',
        'sexo',
        'email',
        'tipo',
        'apellidos',
        'foto_perfil'
    ];
}
