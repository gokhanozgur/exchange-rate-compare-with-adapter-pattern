<?php

namespace App\Http\Controllers\ExchangeRate;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CustomResponseBuilder\CustomResponseBuilder;
use App\Http\Helpers\CustomResponseBuilder\ErrorCode;
use App\Library\ExchangeRate\ExchangeRate;
use App\Library\ExchangeRate\IExchangeRate;
use App\Providers\ExchangeAdapterProvider\Company1;
use App\Providers\ExchangeAdapterProvider\Company2;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{

    public function getComparedJsonResponse(){

        $exchangeRate = new ExchangeRate();

        $company1Response = $exchangeRate->getCompanyExchangeRates(new Company1(),"http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0");
        $company2Response = $exchangeRate->getCompanyExchangeRates(new Company2(),"http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3");

        /*$fakeResult = [
            ["shortCode" => "DOLAR","rate" => 3.12345],
            ["shortCode" => "AVRO","rate" => 8.12345],
            ["shortCode" => "İNGİLİZ STERLİNİ","rate" => 1.12345],
        ];*/

        $responseArray = [$company1Response,$company2Response];

        $response = $exchangeRate->compareRateFromMultipleArray($responseArray);

        return $exchangeRate->getComparedJson($response);

    }

    public function getComparedConsoleResponse(){

        $exchangeRate = new ExchangeRate();

        $company1Response = $exchangeRate->getCompanyExchangeRates(new Company1(),"http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0");
        $company2Response = $exchangeRate->getCompanyExchangeRates(new Company2(),"http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3");

        $responseArray = [$company1Response,$company2Response];

        $response = $exchangeRate->compareRateFromMultipleArray($responseArray);

        return $exchangeRate->getComparedConsoleResult($response);

    }

    public function getComparedViewResponse(){

        $exchangeRate = new ExchangeRate();

        $company1Response = $exchangeRate->getCompanyExchangeRates(new Company1(),"http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0");
        $company2Response = $exchangeRate->getCompanyExchangeRates(new Company2(),"http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3");

        $responseArray = [$company1Response,$company2Response];

        $response = $exchangeRate->compareRateFromMultipleArray($responseArray);

        return view("exchange-list",compact("response"));

    }


}
