<?php

use App\Http\Controllers\API\v1\Thread\ThreadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function () {
   /*
    Route::prefix('/thread')->group(function () {
        Route::get('/', [ThreadController::class,'index'])->name('thread.index');
        Route::post('/create', [ThreadController::class,'create'])->name('thread.create');
        Route::put('/edit', [ThreadController::class,'edit'])->name('thread.edit');
        Route::delete('/delete', [ThreadController::class,'destroy'])->name('thread.delete');

    });
*/
    include __DIR__ .'\v1\auth_routes.php';

    include __DIR__ .'\v1\channel_routes.php';

    include __DIR__ .'\v1\thread_routes.php';

});
