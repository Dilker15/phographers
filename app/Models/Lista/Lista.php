<?php

namespace App\Models\Lista;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    protected $table = 'listas';

    protected $fillable=[
        'codigo_qr_id'
    ];

}
