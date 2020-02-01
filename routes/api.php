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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Your can access like localhost:8000/api/v1/action

Route::prefix('v1')->group(function () {

    Route::get("compare/result","ExchangeRate\ExchangeRateController@getComparedResponse");

});


