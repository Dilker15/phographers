<?php

namespace App\Models\CodigoQr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoQr extends Model
{
    use HasFactory;

    protected $table = 'codigos_qr';

    protected $fillable = [
        'evento_id'
    ];


}
