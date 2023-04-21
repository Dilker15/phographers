<?php

namespace App\Models\Suscripcion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;
    
    protected $table = 'suscripciones';

    protected $fillable = [
        'plan_id',
        'fotografo_id',
        'fecha',
        'estado'

    ];
    
}
