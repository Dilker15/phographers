<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Invitado\InvitadoController;
use App\Http\Controllers\Evento\EventoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    //return $request->user();
    Route::get('/getMisEvento',[InvitadoController::class,'misEventos']);
    Route::get('/fotosDeMiEvento/{evento}',[InvitadoController::class,'getFotosEvento']);
});


Route::post('/crearInvitados',[InvitadoController::class,'appInvitado']);  // este es el crear un invitado con foto y codigo de dispositivo para notificarle cuando se encuentre un match en las fotos de algun fotografo

Route::post('/login',[InvitadoController::class,'loginInvitado']);

Route::get('/enviarCorreo',[EventoController::class,'sendEmail']);
//Route::get('/getMisEvento',[InvitadoController::class,'index']);









Route::get('/bajaCalidad',[InvitadoController::class,'obtenerImagenConBajaCalidad']);

//Route::get('/generateQr',[EventoController::class,'mostrarQr']);
