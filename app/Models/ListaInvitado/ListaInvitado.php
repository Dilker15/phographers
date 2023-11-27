<?php

namespace App\Models\ListaInvitado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaInvitado extends Model
{
    use HasFactory;

    protected $table='lista_invitados';

    protected $fillable = [
        'invitado_id',
        'evento_id'

    ];

    
}
