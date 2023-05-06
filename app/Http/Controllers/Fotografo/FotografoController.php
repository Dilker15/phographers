<?php

namespace App\Http\Controllers\Fotografo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fotografo\Fotografo;
use App\Models\Foto\Foto;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("hola");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|image|max:2048'
        // ]);

        // // $foto = Foto::create([
        // //     'evento_id' => 1111,
        // //     'fotografo_id' => 1111,
        // //     'url' => "no existe la foto",
        // //     'precio' => 1111

        // // ]);


        // $imagenes = $request->file('file')->store('public/imagenes');

        // // $foto = Foto::create([
        // //     'evento_id' => 1111,
        // //     'fotografo_id' => 1111,
        // //     'url' => "no existe la foto",
        // //     'precio' => 1111

        // // ]);

        // //$url = Storage::url($imagenes);

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
