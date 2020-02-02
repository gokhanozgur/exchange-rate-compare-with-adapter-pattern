<?php

use App\Library\ExchangeRate\ExchangeRate;
use App\Providers\ExchangeAdapterProvider\Company1;
use App\Providers\ExchangeAdapterProvider\Company2;
use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    echo "Hello";
})->describe('Display an inspiring quote');


Artisan::command('compare-result', function () {

    $exchangeRate = new ExchangeRate();

    $company1Response = $exchangeRate->getCompanyExchangeRates(new Company1(),"http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0");
    $company2Response = $exchangeRate->getCompanyExchangeRates(new Company2(),"http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3");

    $responseArray = [$company1Response,$company2Response];

    $response = $exchangeRate->compareRateFromMultipleArray($responseArray);

    echo $exchangeRate->getComparedConsoleResult($response);

});
