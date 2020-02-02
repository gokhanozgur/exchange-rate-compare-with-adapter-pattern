<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',"ExchangeRate\ExchangeRateController@getComparedViewResponse");

Route::prefix('company')->group(function () {

    Route::get("compare/result","ExchangeRate\ExchangeRateController@getComparedJsonResponse"); // you will see json result
    Route::get("console/compare/result","ExchangeRate\ExchangeRateController@getComparedConsoleResponse"); // you will see console result

    Route::get("compare/view/result","ExchangeRate\ExchangeRateController@getComparedViewResponse"); // you will see view result with bootstrap

});


