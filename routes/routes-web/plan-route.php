<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plan\PlanController;



Route::prefix('plan')->name('plan.')->middleware(['auth'])->group(function(){

    Route::get('/',[PlanController::class,'index'])->name('index');

    Route::get('/show/{plan}',[PlanController::class,'show'])->name('show');

    Route::get('/create',[PlanController::class,'create'])->name('create');

    Route::get('/edit/{plan}',[PlanController::class,'edit'])->name('edit');

    Route::post('/store',[PlanController::class,'store'])->name('store');

    Route::put('/update/{plan}',[PlanController::class,'update'])->name('update');

    Route::delete('/delete/{plan}',[PlanController::class,'destroy'])->name('destroy');


});
