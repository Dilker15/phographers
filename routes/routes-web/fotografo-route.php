<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fotografo\FotografoController;



Route::prefix('fotografos-Estudios')->name('fotografos.')->middleware(['auth'])->group(function(){


        Route::get('/',[FotografoController::class,'index'])->name('index');

        // Route::get('/create',[FotografoController::class,'create'])->name('create');

        // Route::post('/store/nuevo',[FotografoController::class,'store'])->name('store');

        Route::get('perfilFotografo',[FotografoController::class,'verPerfil'])->name('perfil');

        Route::get('albunFotografo/{Fotografo}',[FotografoController::class,'verAlbun'])->name('albun');


        Route::get('/show/{fotografo}',[FotografoController::class,'show'])->name('show');

        Route::get('/edit/{fotografo}',[FotografoController::class,'edit'])->name('edit');

        Route::delete('delete/{fotografo}',[FotografoController::class,'destroy'])->name('destroy');

        Route::put('/update/{fotografo}',[FotografoController::class,'update'])->name('update');

        Route::get('/fotografo/actividad/{evento}/{fotografo}',[FotografoController::class,'actividad'])->name('actividad');

        

        // Route::get('/principal',[FotografoController::class,'grilla'])->name('princ');
        

        Route::get('/invitaciones',[FotografoController::class,'mostrarInvitaciones'])->name('solicitudes');


        Route::post('propuestaInvitacion',[FotografoController::class,'registrar'])->name('aceptar');

        Route::get('/caroFotos/{evento}/{fotografo}',[FotografoController::class,'cargarFotos'])->name('subirFotos');



        Route::post('/guardandoFotos',[FotografoController::class,'almacenar'])->name('guar');


        

        





});
