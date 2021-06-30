<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Channel\ChannelController;


Route::prefix('/channel')->middleware(['can:channel management','auth:sanctum'])->group(function () {
    Route::get('/', [ChannelController::class,'index'])->name('channel.index');
    Route::post('/create', [ChannelController::class,'create'])->name('channel.create');
    Route::put('/edit', [ChannelController::class,'edit'])->name('channel.edit');
    Route::delete('/delete', [ChannelController::class,'destroy'])->name('channel.delete');

});
