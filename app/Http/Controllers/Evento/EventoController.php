<?php

namespace App\Http\Controllers\Evento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fotografo\Fotografo;
use App\Models\Evento\Evento;
use App\Models\Invitacion\Invitacion;
use App\Models\EventoFotografo\EventoFotografo;
use App\Models\Foto\Foto;
use App\Models\CodigoQr\CodigoQr;
use App\Models\Invitado\Invitado;

use App\Models\ListaInvitado\ListaInvitado;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Aws\Rekognition\RekognitionClient;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Response;



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PhpParser\Node\Stmt\Foreach_;
use App\Models\Token;
//use Illuminate\Support\Facades\Response;

// use BaconQrCode\Encoder\QrCode;
// use BaconQrCode\Common\ErrorCorrectionLevel;
// use BaconQrCode\Common\Mode;

// use BaconQrCode\Renderer\Image\Png;
// use BaconQrCode\Writer;

// use BaconQrCode\Renderer\ImageRenderer;
// use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
// use BaconQrCode\Renderer\RendererStyle\RendererStyle;





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

        //$codigo = CodigoQr::find(1)->get();
        
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
         $invitados = Invitado::get();
        return view('eventos.create',compact('fotografos','invitados'));
    }

    public function mostrarQr($datos){

        $text= "INFORMACION DEL EVENTO: \n";
        $text .= "Evento: ". $datos['nombre']."\n";
        $text .= "Ubicacion : ". $datos['direccion']."\n";

        $text .= "https://www.google.com/maps/@-17.776307,-63.1953219,21z?entry=ttu";
        $text .="\n";
        $text .= "Descripcion: " .$datos['descripcion']."\n";
        $text .= "Fecha: ". $datos['fecha']."\n";
        $text .= "Hora: " . $datos['hora'];

        // Generar el código QR con el texto proporcionado
        $qrCode = QrCode::size(300)
        ->backgroundColor(255, 255, 255) // Fondo blanco (puede variar según tus necesidades)
        ->color(255, 0, 0) // Color rojo: RGB (255, 0, 0)
        ->generate($text);
        //dd($qrCode->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png'));

       
        //dd($qrCode);
        // Crear una respuesta con la imagen del código QR en formato PNG
        // $response = new Response($qrCode);
        // $response->header('Content-type', 'image/jpg');

        $response = new Response($qrCode);       // DESDE AQUI FUNCIONA
        $response->header('Content-Type', 'image/png');
        $response->header('Content-Disposition', 'attachment; filename="codigo_qr.png"');
        $response->header('Pragma', 'public');

        // Devuelve la respuesta con el contenido del archivo y las cabeceras
         //return response($qrCode, 200);         // FUNCIONA
         $codigoQr = CodigoQr::create([
            'evento_id'=>1,
            'imagen_codigo'=>$qrCode,
        ]);
        return  $qrCode;
      

    }

    /**
     * Store a newly created re300source in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request;
        
        $fotografos =$datos['fotografos'];
        
        $invitados = $datos['invitados'];
        $this->enviarNotificacionesLosInvitados($invitados,$request['nombre']);
        //dd($datos['invitados']);
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


        for($i=0;$i<count($invitados);$i++){
            $invitado = Invitado::where('email',$invitados[$i])->first();
            $listasInvitados = ListaInvitado::create([
                'codigo_qr_id'=>1,
                'invitado_id'=>$invitado->id,
                'evento_id'=>$evento->id,
            ]);
        }
       
        




     for( $i=0;$i<count($fotografos);$i++){

        $invitacion = Invitacion::create([
            'evento_id' => $evento->id,
            'fotografo_id' => $fotografos[$i],
            'estado' => 0
        ]);


        
     }
     
     $qr = $this->mostrarQr($datos);

     $invitado = Invitado::where('id','=',auth()->user()->invitado_id)->get()->first();
     return view('eventos.show',compact('qr'));
       // return view('invitados.index',compact('invitado'));
    }


    public function enviarNotificacionesLosInvitados($invitados,$nombreEvento){
      
    
      
        for($i=0;$i<count($invitados);$i++){
            $email = $invitados[$i];
            $mail = new PHPMailer(true);
    
            try {
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'dilker72@gmail.com';                     //SMTP username
                $mail->Password   = 'sbvsxirgdgifgand';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you 
                $mail->setFrom('dilker72@gmail.com', 'Star Eventos');
                $mail->addAddress($email);     //Add a recipient
              
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Invitacion Al Evento';
                $mail->Body    = "Tiene una invitacion al Evento :  ". $nombreEvento;
                $mail->send();
    
                return response()->json([
                    'res' => true,
                    'mensaje' => 'Se envio el corre correctamente'
                ],200);
    
            } catch (Exception $e) {
    
                return response()->json([
                    'res' => false,
                    'mensaje' => 'Ocurrio Un Problemas con los datos : '.  $e,
                    'status' => 500,   
                ],500);
        
            }

        }
        


        
        







    } 

    public function sendEmail(Request $request){
        $invitados = $request['invitados'];
        $nombreEvento = $request['nombre'];
        // return response()->json([
        //     'invitados'=>$invitados,
        //     'nombre'=>$nombreEvento,
        // ]);
      
        for($i=0;$i<count($invitados);$i++){
            $email = $invitados[$i];
            $mail = new PHPMailer(true);
    
            try {
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'dilker72@gmail.com';                     //SMTP username
                $mail->Password   = 'sbvsxirgdgifgand';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you 
                $mail->setFrom('dilker72@gmail.com', 'Star Eventos');
                $mail->addAddress($email);     //Add a recipient
              
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Invitacion Al Evento';
                $mail->Body    = "Tiene una invitacion al Evento :  ". $nombreEvento;
                $mail->send();
    
                return response()->json([
                    'res' => true,
                    'mensaje' => 'Se envio el corre correctamente'
                ],200);
    
            } catch (Exception $e) {
    
                return response()->json([
                    'res' => false,
                    'mensaje' => 'Ocurrio Un Problemas con los datos : '.  $e,
                    'status' => 500,   
                ],500);
        
            }

        }
        







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
        //dd($fotografos);
        $invitados = ListaInvitado::where('evento_id',$evento)->get();
        //dd($invitados);
        $invitadosDelEvento =[];
        $i=0;
        foreach ($invitados as $invitado) {

            $actualInvitado = Invitado::where('id',$invitado->invitado_id)->first();
            //$userPhotos = $photos->where('email', $actualInvitado);
            $invitadosDelEvento[$i]=$actualInvitado->nombre . '-' .$actualInvitado->email.'-'.$actualInvitado->foto_perfil;
            $i++;
        }

        
        
        return view('eventos.actividad',compact('fotografos','evento','invitadosDelEvento'));
        


    }


    public function fotos($fotografo,$evento){

        $fotos = Foto::where('evento_id','=',$evento)->where('fotografo_id','=',$fotografo)->get();
        
        // AQUI SE HACE LA COMPARACION DE LA FOTO DEL EVENTO CON LA DEL PERFIL DEL USUARIO O INVITADO

        $even = Evento::where('id','=',$evento)->get()->first();
        $invitado =Invitado::find($even->invitado_id);
        $cliente = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' =>'latest'
        ]);

        //dd($fotos[0]->url);

        $datos=[];
        $i=0;
        foreach($fotos as $fo){
            
            $result = $cliente->compareFaces([
                'SimilarityThreshold' => 70, // Umbral de similitud (ajusta según tus necesidades)
                'SourceImage' => [
                    'Bytes' => file_get_contents($invitado->foto_perfil),
                ],
                'TargetImage' => [
                    'Bytes' => file_get_contents($fo->url),
                ],
            ]);
            
            $faceMatches = $result['FaceMatches'];
            // $datos[$i]=$faceMatches;
            // $i++;
            // //dd($faceMatches);
            if(count($faceMatches)>0){
                $fo->similar=true;

                // notificar user->id == movil_id
            }
    }

         //$faceMatches = $result['FaceMatches'];


        // dd($datos);
        

    


        
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
