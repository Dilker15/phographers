<?php

namespace App\Http\Controllers\Fotografo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fotografo\Fotografo;
use App\Models\Foto\Foto;
use App\Models\User;
use App\Models\Invitacion\Invitacion;
use App\Models\EventoFotografo\EventoFotografo;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FotografoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotografo = Fotografo::where("id","=",auth()->user()->invitado_id)->get()->first();

        $eventos = $fotografo->eventos;

        return view('fotografos.index',compact('eventos','fotografo'));


    }

    public function mostrarInvitaciones(){
        $fotografo = Fotografo::where('id','=',auth()->user()->invitado_id)->get()->first();
        $invitaciones =$fotografo->invitaciones;
        return view('fotografos.invitaciones',compact('invitaciones'));
    }

    public function registrar(Request $request){

        $invitacion = Invitacion::find($request['invitacion_id']);

        $invitacion->update([
            'estado' => 1
        ]);


        $evento = EventoFotografo::create([
            'fotografo_id' => $request['fotografo'],
            'evento_id' => $request['evento'],
        ]);


        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fotografos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if($request->hasFile('imagen')){
                $imagenes = $request->file('imagen');
             
                $nombres=time().'.'.$imagenes->extension();
                Storage::putFileAs('public/perfiles-fotografos',new File($imagenes),$nombres);
            }

            $fotografo = Fotografo::create([
                'nombre'=> $request['nombre'],
                'apellidos' => $request['apellidos'],
                'email'=> $request['email'],
                'foto_perfil' =>$nombres,
                'telefono' => $request['telefono'],
                'tipo' => 2,
                'sexo'=>$request['sexo'],

            ]);

            $usuario = User::create([
                'name' =>$request['nombre'],
                'email' =>$request['email'],
                'role_id' => 2,
                'invitado_id' => $fotografo->id,
                'tipo_user' => 1,
                'password' => bcrypt($request['password']),
            ]);
        
            return view('welcome');

    }


    public function grilla(){
        $fotografos = Fotografo::get();
        // $fotos =Storage::allFiles('/perfiles-fotografos');
        // dd($fotos);
        return view('fotografos.grilla',compact('fotografos'));
    }


    public function catalogo($fotografo){

       
        return view('fotografos.catalogo',compact('fotografo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fotografo)
    {
        
    }



    public function actividad($evento,$fotografo){

        
        $fotos = Foto::where('evento_id','=',$evento)->where('fotografo_id','=',$fotografo)->get();
        
        
        return view('fotografos.galeria',compact('fotos','evento','fotografo'));

    }

    


    public function cargarFotos($evento,$fotografo){


        return view('fotografos.subirFotos',compact('evento','fotografo'));

    }



    public function almacenar(Request $request){

        // $request->validate([
        //     'file' => 'required|image|max:2048'
        // ]);

        $evento=$request['evento'];
        $fotografo = $request['fotografo'];
        $foto= new Foto();
        $foto->precio=66;
        $foto->evento_id=$evento; 
        $foto->fotografo_id=$fotografo;
        $foto->url="nueva";
        $foto->tipo=0;
        $foto->save();
        $imagenes = $request->file('file');

        $imagenes->store('public/imagenes');
            
     


        

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
    }
}
