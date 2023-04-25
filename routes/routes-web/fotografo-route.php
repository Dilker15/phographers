<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\Fotografo\FotografoController;



Route::prefix('fotografos-Estudios')->name('fotografos.')->middleware(['auth'])->group(function(){


        Route::get('/',[FotografoController::class,'index'])->name('index');

        Route::get('/create',[FotografoController::class,'store'])->name('create');

        Route::post('/store',[FotografoController::class,'store'])->name('store');

        Route::get('/show/{fotografo}',[FotografoController::class,'show'])->name('show');

        Route::get('/edit/{fotografo}',[FotografoController::class,'edit'])->name('edit');

        Route::delete('delete/{fotografo}',[FotografoController::class,'destroy'])->name('destroy');

        Route::put('/update/{fotografo}',[FotografoController::class,'update'])->name('update');



});
