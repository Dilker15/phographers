<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fotografo\FotografoController;
use App\Http\Controllers\Invitado\InvitadoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('main');
    })->name('main');
});


Route::get('/principal',[FotografoController::class,'grilla'])->name('princ');


Route::get('/albun/{fotografo}',[FotografoController::class,'catalogo'])->name('catalogos');



Route::get('/crearFotografo',[FotografoController::class,'create'])->name('crearFotografo');


Route::post('/store/Fotografo',[FotografoController::class,'store'])->name('storeFotografo');

Route::get('/crearInvitado',[InvitadoController::class,'create'])->name('crearInvitado');

Route::post('/store/Invitado',[InvitadoController::class,'store'])->name('storeInvitado');
