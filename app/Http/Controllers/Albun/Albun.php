<?php

namespace App\Http\Controllers\Albun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Albun\Albun;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Fotografo\Fotografo;

class Albun extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function guar(Request $request){
        $imagen = $request->file('file');
        $nombre =time().'.'.$imagen->extension();
        $id=$request['fotografo'];
        // $fotografo =Fotografo::where('id','=',$id)->get()->first();
        // $correo =$fotografo->email;
        // $albun =Albun::create([
        //     'fotografo_id' => $id,
        //     'foto1' => $nombre,
        // ]);
        Storage::putFileAs('public/'.$id,new File($imagen),$nombre);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($fotografo)
    {
        return view('albunes.guardarFotos',compact('fotografo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //gffgdsgfdfasdf
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
