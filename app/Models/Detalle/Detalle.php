<?php

namespace App\Models\Detalle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;

    protected $table = 'detalle_pagos';

    protected $fillable = [
        'pago_id',
        'foto_id',
        'cantidad',
        'total'
    ];
}
