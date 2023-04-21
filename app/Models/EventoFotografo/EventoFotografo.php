<?php

namespace App\Models\EventoFotografo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoFotografo extends Model
{
    use HasFactory;

    protected $table = 'evento_fotografos';

    protected $fillable = [
        'fotografo_id',
        'evento_id'
    ];
}
