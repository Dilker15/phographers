<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controller\Administrador\AdministradorController;



Route::prefix('administrador')->name('adminstrador.')->middleware(['auth'])->group(function(){

    
    Route::get('/',[AdminstradorController::class,'index'])->name('index');

    Route::get('/create',[AdminstradorController::class,'store'])->name('create');

    Route::get('/edit/{administrador}',[AdminstradorController::class,'edit'])->name('edit');

    Route::put('/update/{administrador}',[AdminstradorController::class,'update'])->name('update');

    Route::get('/show/{administrador}',[AdminstradorController::class,'show'])->name('show');

    Route::delete('/delete/{administrador}',[AdminstradorController::class],'destroy')->name('delete');



});