<?php

namespace App\Http\Controllers\Invitado;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitado\Invitado;
use App\Models\EventoFoto\EventoFoto;
use App\Models\ListaInvitado\ListaInvitado;
use App\Models\User;
use App\Models\Dispositivo\Dispositivo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


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
            // if($request->hasFile('imagen')){

            //     $imagen =$request->file('imagen');
            //     $nombre =time().'.'.$imagen->extension();
            //     Storage::putFileAs('public/perfiles-invitados',new File($imagen),$nombre);
          
            // }

            $imagen = $request->file('imagen');
            $fotoCloud =Cloudinary::upload($imagen->getRealPath(),['folders'=>'fotografos']);
    
            $public_id=$fotoCloud->getPublicId();
            $url =$fotoCloud->getSecurePath();
            

            $invitado = Invitado::create([
                'nombre' => $request['nombre'],     // obligatorio
                'email' => $request['email'],       // obligatorio
                'foto_perfil' => $url,              // obligatorio
                'tipo' => 1,
            ]);


            $usuario = User::create([
                'name' => $request['nombre'],
                'email' => $request['email'],
                'role_id' => 1,
                'invitado_id' => $invitado->id,
                'tipo_user' => 2,
                'password' => bcrypt($request['password']),  // obligatorio
            ]); 

            return view('welcome');
    }



    public function appInvitado(Request $request){

        $imagen = $request->file('imagen');
        $fotoCloud =Cloudinary::upload($imagen->getRealPath(),['folders'=>'fotografos']);

        $public_id=$fotoCloud->getPublicId();
        $url =$fotoCloud->getSecurePath();

        $invitado = Invitado::create([
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'foto_perfil' => $url,
            'tipo' => 1,
        ]);

        $usuario = User::create([
            'name' => $request['nombre'],
            'email' => $request['email'],
            'role_id' => 1,
            'invitado_id' => $invitado->id,
            'tipo_user' => 2,
            'password' => bcrypt($request['password']),
            'profile_photo_path'=>$url
        ]); 



        $dipositivo = Dispositivo::create([
            'invitado_id'=>$invitado->id,
            'codigo_dispositivo'=>$request['codigo_dispositivo'],
        ]);

        return response()->json([
            'res'=>true,
            'mensaje'=>"User creado con exito",
        ]);
            

        
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


    public function loginInvitado(Request $request){

            $user = User::where('email',$request['email'])->first();
            $tokenDispositivo = $request['token'];
            Dispositivo::create([
                'codigo_dispositvo'=>$tokenDispositivo,
                'invitado_id'=>$user->invitado_id,
            ]);
            if($user && Hash::check($request['password'],$user->password)){
                $token = $user->createToken($user->email)->plainTextToken;
                $user->save();

                return response()->json([
                    'res' => true,
                    'token' => $token,
                    "mensaje"=>"datos correctos",
                ]);

                
            }

        return response()->json([
            'res'=>false,
            'mensaje'=>"Datos incorrectos",
        ]);


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
        return view('invitados.index');
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


    public function getFotosEvento($evento){
        $invitado = Auth::user()->invitado_id;
        // dd($invitado);
        $fotos = EventoFoto::where('evento_id',$evento)->where('invitado_id',$invitado)->get();


        // $url = 'https://res.cloudinary.com/dirau81x6/image/upload/v1701013218/lrav4e1njm6kgh92tpvk.jpg';

        // $pattern = '/(\/upload\/)/';
        // $replacement = '$1q_5/';

        // $newUrl = preg_replace($pattern, $replacement, $url);

        // return response()->json([
        //     'res'=>true,
        //     'datos'=>$newUrl,
        // ]);
        foreach($fotos as $foto){
            $url = $foto->foto;

            $pattern = '/(\/upload\/)/';
            $replacement = '$1q_5/';
    
            $newUrl = preg_replace($pattern, $replacement, $url);
            $foto->foto=$newUrl;

        }
        return response()->json([
            'res'=>true,
            'datos'=>$fotos,
        ]);
   }



   public function misEventos(Request $request){
    $usuario = Auth::user()->email;
  
        $eventos = ListaInvitado::where('invitado_id',$invitado)->get();
        return response()->json([
            'res'=>true,
            'datos'=>$eventos,
        ]);
   }


//    use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

        public function obtenerImagenConBajaCalidad()
        {
           
            $url = 'https://res.cloudinary.com/dirau81x6/image/upload/v1701013218/lrav4e1njm6kgh92tpvk.jpg';

            $pattern = '/(\/upload\/)/';
            $replacement = '$1q_5/';

            $newUrl = preg_replace($pattern, $replacement, $url);

            return response()->json([
                'res'=>true,
                'datos'=>$newUrl,
            ]);
        }

}
