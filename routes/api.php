<?php

use Illuminate\Http\Request;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'aspire', 'namespace' => 'Api'], function () {
    
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

//    Route::group(['middleware' => 'auth:api'], function () {

        Route::post('/loans/create', 'LoansController@create');
        Route::get('/loans', 'LoansController@index');
        Route::get('/loans/{id}', 'LoansController@show');

//    });
});
