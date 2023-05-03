<?php

namespace App\Models\Fotografo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evento\Evento;

class Fotografo extends Model
{
    use HasFactory;

    protected $table = 'fotografos_estudios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'foto_perfil',
        'email',
        'telefono',
        'estudio',
        'sexo',
        'tipo'
    ];




        public function eventos(){
        
            return $this->belongsToMany(Evento::class,'evento_fotografos');
            
        }


    
}
