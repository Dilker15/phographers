<?php

namespace App\Models\Dispositivo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;

    protected $table = 'dispositivos';


    protected $fillable = [
        'invitado_id',
        'codigo_dispositivo',
        'estado',
    ];



}
