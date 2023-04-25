<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Galeria\GaleriaController;



Route::prefix('galeria')->name('galeria.')->middleware(['auth'])->group(function(){

    Route::get('/',[GaleriaController::class,'index'])->name('index');

    Route::get('/show/{galeria}',[GaleriaController::class,'show'])->name('show');

    Route::get('/create',[GaleriaController::class,'create'])->name('create');

    Route::get('/edit/{galeria}',[GaleriaController::class,'edit'])->name('edit');

    Route::post('/store',[GaleriaController::class,'store'])->name('store');

    Route::put('/update/{galeria}',[GaleriaController::class,'update'])->name('update');

    Route::delete('/delete/{galeria}',[GaleriaController::class,'destroy'])->name('destroy');


});