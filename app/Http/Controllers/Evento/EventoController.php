<?php

namespace App\Http\Controllers\Evento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fotografo\Fotografo;
use App\Models\Evento\Evento;
use App\Models\Invitacion\Invitacion;
use App\Models\EventoFotografo\EventoFotografo;
use App\Models\Foto\Foto;

use App\Models\Invitado\Invitado;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::where('invitado_id','=',auth()->user()->invitado_id)->get();
       
       
        return view('eventos.index',compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $fotografos = Fotografo::get();
         
        return view('eventos.create',compact('fotografos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request;
        
        $fotografos =$datos['fotografos'];
        
        // dd($fotografos);
        $evento = Evento::create([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
            'fecha_evento' => $datos['fecha'],
            'hora_evento' => $datos['hora'],
            'invitado_id' => auth()->user()->invitado_id,
            'ubicacion' => $datos['direccion'],
            'estado' => 1
        ]);



     for( $i=0;$i<count($fotografos);$i++){

        $invitacion = Invitacion::create([
            'evento_id' => $evento->id,
            'fotografo_id' => $fotografos[$i],
            'estado' => 0
        ]);
        
     }
     $invitado = Invitado::where('id','=',auth()->user()->invitado_id)->get()->first();
        return view('invitados.index',compact('invitado'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($evento)
    {
        return view('eventos.show',compact('evento'));
    }



    public function actividad($evento){


        // $eventos = EventoFotografo::where('evento_id','=',$evento)->get()->first();
        // dd(count($creacion));
        // OBTENIENDO LA GALERIA DEL EVENTO AL CUAL SELECCIONAMOS EN LA VISTA Y PARA MOSTRAR LAS FOTOS DE LA GALERIA

        $nuevos = Evento::find($evento);
        
        $fotografos = $nuevos->fotografos;
        
        // dd($fotografos);
        
        return view('eventos.actividad',compact('fotografos','evento'));
        


    }


    public function fotos($fotografo,$evento){

        $fotos = Foto::where('evento_id','=',$evento)->where('fotografo_id','=',$fotografo)->get();

        return view('eventos.galeria',compact('fotos'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('eventos.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


   
}
