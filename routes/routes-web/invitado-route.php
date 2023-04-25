<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Invitado\InvitadoController;




Route::prefix('invitado')->name('invitado.')->middleware(['auth'])->group(function(){


        Route::get('/',[InvitadoController::class,'index'])->name('index');

        Route::get('/create',[InvitadoController::class,'store'])->name('create');

        Route::get('/edit/{invitado}',[InvitadoController::class,'edit'])->name('edit');

        Route::put('/update/{invitado}',[InvitadoController::class,'update'])->name('update');

        Route::get('/show/{invitado}',[InvitadoController::class,'show'])->name('show');

        Route::delete('/delete/{invitado}',[InvitadoController::class],'destroy')->name('delete');




});