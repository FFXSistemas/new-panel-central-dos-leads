<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function(){
    Route::post('/store', ['uses' => 'API\\LeadsController@store', 'as' => 'store']);
});

Route::group(['prefix' => 'bot', 'as' => 'bot.'], function(){
    Route::get('/crivo', ['uses' => 'API\\BotMailController@getCrivo', 'as' => 'crivo']);
});
