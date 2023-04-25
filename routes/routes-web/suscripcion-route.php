<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Suscripcion\SuscripcionController;



Route::prefix('suscripcion')->name('suscripcion.')->middleware(['auth'])->group(function(){

    Route::get('/',[SuscripcionController::class,'index'])->name('index');

    Route::get('/show/{suscripcion}',[SuscripcionController::class,'show'])->name('show');

    Route::get('/create',[SuscripcionController::class,'create'])->name('create');

    Route::get('/edit/{suscripcion}',[SuscripcionController::class,'edit'])->name('edit');

    Route::post('/store',[SuscripcionController::class,'store'])->name('store');

    Route::put('/update/{suscripcion}',[SuscripcionController::class,'update'])->name('update');

    Route::delete('/delete/{suscripcion}',[SuscripcionController::class,'destroy'])->name('destroy');


});
