<?php

namespace App\Models\Foto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;


    protected $table = 'fotos';


    protected $fillable =[
        'galeria_id',
        'precio',
        'url',
        'tipo'
    ];
}
