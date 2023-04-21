<?php

namespace App\Models\Albun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albun extends Model
{
    use HasFactory;

    protected $table = 'albunes';

    protected $fillable = [
        'fotografo_id',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
        'foto6',
        'foto7',
        'foto9',
        'foto10'
    ];
    
}
