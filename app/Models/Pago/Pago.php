<?php

namespace App\Models\Pago;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;


    protected $table = 'pagos';

    protected $fillable = [
        'monto_total',
        'fecha',
        'invitado_id',
        'estado'
    ];
}
