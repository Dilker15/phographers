<?php

namespace App\Models\Foto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;


    protected $table = 'fotos';


    protected $fillable =[
        'fotografo_id',
        'evento_id',
        'url',
        'precio',
        'tipo',
        'cloudinary_id'
    ];


    
}
