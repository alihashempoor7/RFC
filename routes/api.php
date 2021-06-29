<?php

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

    Route::prefix('/auth')->group(function () {
        Route::post('/register', 'API\v1\Auth\AuthController@register')->name('register');
        Route::post('/login', 'API\v1\Auth\AuthController@login')->name('login');
        Route::post('/logout', 'API\v1\Auth\AuthController@logout')->name('logout');
        Route::get('/user', 'API\v1\Auth\AuthController@user')->name('user');
    });
    Route::prefix('/channel')->group(function () {
        Route::get('/', 'API\v1\Channel\ChannelController@index')->name('channel.index');
        Route::post('/create', 'API\v1\Channel\ChannelController@create')->name('channel.create');
        Route::put('/edit', 'API\v1\Channel\ChannelController@edit')->name('channel.edit');
        Route::delete('/delete', 'API\v1\Channel\ChannelController@destroy')->name('channel.delete');

    });
});
