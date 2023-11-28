<?php

namespace App\Http\Controllers\Fotografo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fotografo\Fotografo;
use App\Models\Foto\Foto;
use App\Models\User;
use App\Models\Invitacion\Invitacion;
use App\Models\EventoFotografo\EventoFotografo;
use App\Models\Albun\Albun;
use App\Models\EventoFoto\EventoFoto;
use App\Models\ListaInvitado\ListaInvitado;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Invitado\Invitado;
use App\Models\Dispositivo\Dispositivo;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;
use Aws\Rekognition\RekognitionClient;

use Illuminate\Http\File;

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
            // if($request->hasFile('imagen')){
            //     $imagenes = $request->file('imagen');
             
            //     $nombres=time().'.'.$imagenes->extension();
            //     Storage::putFileAs('public/perfiles-fotografos',new File($imagenes),$nombres);
            // }

            $imagen = $request->file('imagen');
            // $nombre =time().'.'.$imagen->extension();
    
    
            $fotoCloud =Cloudinary::upload($imagen->getRealPath(),['folders'=>'fotografos']);
    
            $public_id=$fotoCloud->getPublicId();
            $url =$fotoCloud->getSecurePath();
            

            $fotografo = Fotografo::create([
                'nombre'=> $request['nombre'],
                'apellidos' => $request['apellidos'],
                'email'=> $request['email'],
                'foto_perfil' => $url,
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


    public function verPerfil(){
        $fotografo = Fotografo::where('id','=',auth()->user()->invitado_id)->get()->first();

        return view('fotografos.perfil',compact('fotografo'));
    }



    public function verAlbun($fotografo){
        $albun = Albun::where('id','=',$fotografo)->get();

        return view('fotografos.albun',compact('albun','fotografo'));
    }


    public function actividad($evento,$fotografo){

        
        $fotos = Foto::where('evento_id','=',$evento)->where('fotografo_id','=',$fotografo)->get();
        
        
        return view('fotografos.galeria',compact('fotos','evento','fotografo'));

    }

    public function RegistrarYNotificar($url_imagen,$evento){
        $invitados = ListaInvitados::where('evento_id',$evento)->get();
        
            foreach($invitados as $invitado){

                EventoFoto::create([
                    'invitado_id'=>$invitado->id,
                    'evento_id'=>$evento,
                    'foto'=>$url_imagen,
                ]);
            }
        



        // $listasInvitados = ListaInvitado::create([
        //     'codigo_qr_id'=>1,
        //     'invitado_id'=>$invitado->id,
        //     'evento_id'=>$evento->id,
        // ]);
            
    }

    


    public function cargarFotos($evento,$fotografo){


        return view('fotografos.subirFotos',compact('evento','fotografo'));

    }



    public function almacenar(Request $request){
        $imagen = $request->file('file');
        $nombre =time().'.'.$imagen->extension();


        $fotoCloud =Cloudinary::upload($imagen->getRealPath(),['folders'=>'fotografos']);

        $public_id=$fotoCloud->getPublicId();
       
        $url =$fotoCloud->getSecurePath();
        
        $foto = Foto::create([
            'fotografo_id' => $request['fotografo'],
            'evento_id'=>$request['evento'],
            'precio' => 10.00,
            'url' => $url,
            'cloudinary_id'=>$public_id,
         ]);
         $invitados = ListaInvitado::where('evento_id',$request['evento'])->get();
        //  EventoFoto::create([
        //     'invitado_id'=>1,
        //      'evento_id'=>1,
        //      'foto'=>$url,
        //  ]);

          $cliente = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' =>'latest'
            ]);

            foreach($invitados as $invitado){


                $invitadoActual = Invitado::find($invitado->invitado_id);
                $fotoActual = $invitadoActual->foto_perfil;

              
                $result = $cliente->compareFaces([
                    'SimilarityThreshold' => 70, // Umbral de similitud (ajusta según tus necesidades)
                    'SourceImage' => [
                        'Bytes' => file_get_contents($fotoActual),
                    ],
                    'TargetImage' => [
                        'Bytes' => file_get_contents($url),
                    ],
                ]);

                

               
                $faceMatches = $result['FaceMatches'];
                if(count($faceMatches)>0){
                    EventoFoto::create([
                        'evento_id'=>$request['evento'],
                        'foto'=>$url,
                        'invitado_id'=>$invitado->invitado_id,
                    ]);

                    try {
                        
                    $token = Dispositivo::where('invitado_id',$invitado->invitado_id)->first()->codigo_dispositivo;

                    $messages = [
                        new ExpoMessage([
                            'title' => 'Concidencia encontrada',
                            'body' => 'Apareces en una foto en un Evento',
                        ]),
                    ];
                    $defaultRecipients = [
                        "$token",
                    ];
                    (new Expo)->send($messages)->to($defaultRecipients)->push();
                    } catch (\Throwable $th) {
                        
                    }


                }


        
            }
             
       
         
        
        

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
