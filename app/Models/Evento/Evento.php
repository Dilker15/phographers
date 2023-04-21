<?php

namespace App\Models\Evento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;


    protected $table= 'eventos';


    protected $fillable = [
        'nombres',
        'descripcion',
        'fecha_evento',
        'hora_evento',
        'estado',
        'ubicacion',
        'administrador_id',
        
    ];
}
