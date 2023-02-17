<?php

use Illuminate\Http\Request;
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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api'], function () {

    Route::post('login', 'AuthController@login'); // == Login ==

    // == This routes user must be logged in ==
    Route::group(['middleware' => ['auth:api']], function () {

        // ==  account_statement  ==
        Route::get('account_statement', 'GetOprationController@account_statement');

        // ==  Office data  ==
        Route::get('office_data', 'GetOprationController@office_data');

        // ==  job   ==
        Route::get('jobs', 'GetOprationController@jobs');
        // ==  applying   ==
        Route::post('applying ', 'GetOprationController@applying');

        // ==  process by code   ==
        Route::post('process ', 'GetOprationController@get_process');

        // ==  visa by code   ==
        Route::post('visa ', 'GetOprationController@get_visa');
    });
});