<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lista\ListaController;



Route::prefix('lista')->name('lista.')->middleware(['auth'])->group(function(){

    Route::get('/',[ListaController::class,'index'])->name('index');

    Route::get('/show/{lista}',[ListaController::class,'show'])->name('show');

    Route::get('/create',[ListaController::class,'create'])->name('create');

    Route::get('/edit/{lista}',[ListaController::class,'edit'])->name('edit');

    Route::post('/store',[ListaController::class,'store'])->name('store');

    Route::put('/update/{lista}',[ListaController::class,'update'])->name('update');

    Route::delete('/delete/{lista}',[ListaController::class,'destroy'])->name('destroy');


});
