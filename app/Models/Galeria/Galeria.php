<?php

namespace App\Models\Galeria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    protected $table = 'galerias';

    protected $fillable = [
        'descripcion',
        'evento_fotografo_id'
    ];
}
