<?php

namespace App\Models\EventoFoto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoFoto extends Model
{
    use HasFactory;

    protected $table = 'evento_fotos';
    protected $fillable = [
        'evento_id',
        'foto',
        'invitado_id',
        'estado',
    ];

}
