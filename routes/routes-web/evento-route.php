<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Evento\EventoController;




Route::prefix('evento')->name('evento.')->middleware(['auth'])->group(function(){


        Route::get('/',[EventoController::class,'index'])->name('index');

        Route::get('/create',[EventoController::class,'store'])->name('create');

        Route::get('/edit/{evento}',[EventoController::class,'edit'])->name('edit');

        Route::put('/update/{evento}',[EventoController::class,'update'])->name('update');

        Route::get('/show/{evento}',[EventoController::class,'show'])->name('show');

        Route::delete('/delete/{evento}',[EventoController::class],'destroy')->name('delete');




});