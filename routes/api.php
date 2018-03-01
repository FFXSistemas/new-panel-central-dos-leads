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
    Route::post('/chatbot/store', ['uses' => 'API\\ChatbotController@store', 'as' => 'store']);

    Route::post('/recovery-email', ['uses' => 'API\\UsersController@recoveryEmail', 'as' => 'recovery']);
    Route::get('/teste', function (Request $request) {
       return view('templates.emails.recovery');
    });
    Route::group(['prefix' => 'sms', 'as' => 'sms.'], function(){
        Route::post('/send/short', ['uses' => 'API\\SmsController@sendShortSms', 'as' => 'short']);
        Route::post('/send/long', ['uses' => 'API\\SmsController@sendLongSms', 'as' => 'long']);
    });
});

Route::group(['prefix' => 'bot', 'as' => 'bot.'], function(){
    Route::get('/crivo', ['uses' => 'API\\BotMailController@getCrivo', 'as' => 'crivo']);
    Route::get('/divergencia', ['uses' => 'API\\BotMailController@getDivergence', 'as' => 'divergencia']);
    Route::get('/schedules', ['uses' => 'API\\BotMailController@getSchedules', 'as' => 'schedules']);
});
