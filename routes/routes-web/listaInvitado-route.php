<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaInvitados\ListaInvitadosController;



Route::prefix('listaInvitado')->name('listaInvitado.')->middleware(['auth'])->group(function(){

    Route::get('/',[ListaInvitadosController::class,'index'])->name('index');

    Route::get('/show/{listaInvitado}',[ListaInvitadosController::class,'show'])->name('show');

    Route::get('/create',[ListaInvitadosController::class,'create'])->name('create');

    Route::get('/edit/{listaInvitado}',[ListaInvitadosController::class,'edit'])->name('edit');

    Route::post('/store',[ListaInvitadosController::class,'store'])->name('store');

    Route::put('/update/{listaInvitado}',[ListaInvitadosController::class,'update'])->name('update');

    Route::delete('/delete/{listaInvitado}',[ListaInvitadosController::class,'destroy'])->name('destroy');


});
