<?php

use App\Http\Controllers\API\v1\Thread\ThreadController;
use Illuminate\Support\Facades\Route;


//Route::prefix('/thread')->group(function () {
//    Route::get('/', [ThreadController::class,'index'])->name('thread.index');
//    Route::post('/create', [ThreadController::class,'create'])->name('thread.create');
//    Route::put('/edit', [ThreadController::class,'edit'])->name('thread.edit');
//    Route::delete('/delete', [ThreadController::class,'destroy'])->name('thread.delete');
//
//});
Route::resource('thread','API\v1\Thread\ThreadController');
