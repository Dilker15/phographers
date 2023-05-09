<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Albun\Albun;



Route::prefix('albune')->name('albun.')->middleware(['auth'])->group(function(){
    
    Route::get('/',[Albun::class,'index'])->name('index');

    Route::get('/show/{albun}',[Albun::class,'show'])->name('show');


    Route::get('/create/{fotografo}',[Albun::class,'create'])->name('create');


    Route::post('guardarFotos',[Albun::class,'guar'])->name('guar');

    Route::post('/store',[Albun::class,'store'])->name('store');

    Route::put('/update/{albun}',[Albun::class,'update'])->name('update');


    Route::get('/edit/{albun}',[Albun::class,'edit'])->name('edit');

    



});