<?php

Route::get('/sasa', function() {
     echo env('BDATA_USER');
});

Route::get('/details', function () {
    return view('pages.employee.details');
});

Route::get('/send-sms', function () {
    $storage = (new \App\Repositories\PhonesRepository())->all();

    $client = (new GuzzleHttp\Client());
    foreach ($storage as $phone){
        $request = $client->request('POST', 'http://ffxnetbr.com/api/v1/sms/send/long', [
            'query' => ['user_id' => '1', 'employer_id' => '1', 'number' => $phone->phone, 'text' => 'Liberou a internet de fibra no seu bairro! 100 MEGA COM TELEFONE por apenas R$ 120,00! Assine já! http://goo.gl/njbDZ5']
        ]);
        var_dump($request);

    }
});
/**
 * Login Routes
 */
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function(){
    Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'login']);
    Route::post('/login', ['uses' => 'AuthController@authenticate', 'as' => 'authenticate']);
});
/**
 * Authenticated Routes
 */
Route::group(['middleware' => 'usersession'], function () {
    Route::get('', ['uses' => 'PagesController@home'])->name('home');
    /**
     * RH Routes
     */
    Route::group(['prefix' => 'rh', 'as' => 'rh.'], function (){
        Route::group(['prefix' => 'employees', 'as' => 'employee.'], function (){
            Route::get('/view/{id}/details', ['uses' => 'EmployeesController@view', 'as' => 'view']);
        });
    });

    Route::group(['prefix' => 'leads', 'as' => 'leads.'], function () {
       Route::get('', ['uses' => 'LeadsController@all', 'as' => 'all']);
    });
    /**
     * Sales
     */
    Route::group(['prefix' => 'sales', 'as' => 'sales.'], function(){
        Route::group(['prefix' => 'rows', 'as' => 'rows.'], function (){
            Route::get('/audit', ['uses' => 'SalesController@auditSales', 'as' => 'audit']);
            Route::get('/approved', ['uses'=> 'SalesController@approvedSales', 'as' => 'approved']);
        });
        Route::get('/create', ['uses' => 'SalesController@create', 'as' => 'create']);
        Route::get('{id}/view', ['uses' => 'SalesController@view', 'as' => 'view']);
    });
    /**
     * Configurations
     */
    Route::group(['prefix' => 'config', 'as' => 'config.'], function (){
        Route::get('', ['uses' => 'ConfigsController@index', 'as' => 'index']);
        Route::post('/update', ['uses' => 'ConfigsController@updateConfig', 'as' => 'update']);
        Route::get('/blacklist', ['uses' => 'ConfigsController@blacklist', 'as' => 'blacklist']);
    });

    /**
     * Email Treatment
     */
    Route::group(['prefix' => 'emails', 'as' => 'emails.'], function (){
        Route::get('', ['uses' => 'EmailTreatmentController@all', 'as' => 'all']);
        Route::get('/create', ['uses' => 'EmailTreatmentController@create', 'as' => 'create']);
        Route::get('{id}/view', ['uses' => 'EmailTreatmentController@edit', 'as' => 'edit' ]);
        Route::post('{id}/update', ['uses' => 'EmailTreatmentController@update', 'as' => 'update' ]);
    });
});

Route::get('/auth/logout', 'AuthController@logout')->name('auth.logout');



