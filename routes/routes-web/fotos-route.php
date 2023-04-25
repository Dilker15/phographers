<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Foto\FotoController;




Route::prefix('foto')->name('foto.')->middleware(['auth'])->group(function(){


        Route::get('/',[FotoController::class,'index'])->name('index');

        Route::get('/create',[FotoController::class,'store'])->name('create');

        Route::get('/edit/{foto}',[FotoController::class,'edit'])->name('edit');

        Route::put('/update/{foto}',[FotoController::class,'update'])->name('update');

        Route::get('/show/{foto}',[FotoController::class,'show'])->name('show');

        Route::delete('/delete/{foto}',[FotoController::class],'destroy')->name('delete');




});