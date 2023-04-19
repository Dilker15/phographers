<?php

namespace App\Models\Fotografo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografo extends Model
{
    use HasFactory;

    protected $table = 'fotografos_estudios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'foto_perfil',
        'email',
        'telefono',
        'estudio',
        'sexo',
        'tipo'
    ];
}
