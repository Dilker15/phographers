<?php

namespace App\Models\Evento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fotografo\Fotografo;

class Evento extends Model
{
    use HasFactory;


    protected $table= 'eventos';


    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_evento',
        'hora_evento',
        'estado',
        'ubicacion',
        'invitado_id',
        
        
    ];


    public function fotografos(){
        
        return $this->belongsToMany(Fotografo::class,'evento_fotografos');
        
    }



}
