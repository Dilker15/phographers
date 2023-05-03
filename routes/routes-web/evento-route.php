<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Evento\EventoController;




Route::prefix('evento')->name('evento.')->middleware(['auth'])->group(function(){


        Route::get('/',[EventoController::class,'index'])->name('index');

        Route::get('/create',[EventoController::class,'create'])->name('create');

        Route::post('/store',[EventoController::class,'store'])->name('store');
        Route::get('/edit/{evento}',[EventoController::class,'edit'])->name('edit');

        Route::put('/update/{evento}',[EventoController::class,'update'])->name('update');

        Route::get('/show/{evento}',[EventoController::class,'show'])->name('show');

        Route::delete('/delete/{evento}',[EventoController::class],'destroy')->name('delete');


        Route::get('/actividad/{evento}',[EventoController::class,'actividad'])->name('actividad');


        //      AQUI VAN LAS ACTIVIDADES O LOS EVENTOS DEL FOTOGRAFOÇ

         Route::get('/fotos/{fotografo}/{evento}',[EventoController::class,'fotos'])->name('fotos');



});