<?php

namespace App\Http\Controllers\Invitado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitado\Invitado;

class InvitadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitado = Invitado::where('id','=',auth()->user()->invitado_id)->get()->first();

        return view('invitados.index',compact('invitado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invitados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("se mnada aqui");
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
    public function edit($invitado)
    {
       $datos = Invitado::where('id','=',$invitado)->get()->first();
       return view('invitados.edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $invitado)
    {

        //dd($request);

        $datos = $request->all();

        
        $nuevoInvitado = Invitado::find($invitado)->get()->first();
        
        $nuevoInvitado->update($datos);
        echo($nuevoInvitado);
        //dd($invitado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($invitado)
    {
        //
    }
}
