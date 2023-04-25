
<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CodigoQr\CodigoQrController;




Route::prefix('codigo')->name('codigo.')->middleware(['auth'])->group(function(){


        Route::get('/',[CodigoQrController::class,'index'])->name('index');

        Route::get('/create',[CodigoQrController::class,'store'])->name('create');

        Route::get('/edit/{codigo}',[CodigoQrController::class,'edit'])->name('edit');

        Route::put('/update/{codigo}',[CodigoQrController::class,'update'])->name('update');

        Route::get('/show/{codigo}',[CodigoQrController::class,'show'])->name('show');

        Route::delete('/delete/{codigo}',[CodigoQrController::class],'destroy')->name('delete');




});