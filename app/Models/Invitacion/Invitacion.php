<?php

namespace App\Models\Invitacion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evento\Evento;

class Invitacion extends Model
{
    use HasFactory;

    protected $table = 'invitaciones';

    protected $fillable = [
        'evento_id',
        'fotografo_id',
        'estado'
    ];



    public function getColorCardAttribute(){

        $colores = ['bg-danger','bg-success'];

        return $colores[$this->attributes['estado']];
    }



    public function evento(){
        return $this->hasMany(Evento::class);
    }


}
