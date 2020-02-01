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

        $comparedList = [];

        for ($i = 0; $i < count($company1Response); $i++){

            if($company1Response[$i]->amount < $company2Response[$i]->oran){

                $comparedList[$i] = ["shortCode" => $company1Response[$i]->symbol, "rate" => $company1Response[$i]->amount];

            }
            else{

                $comparedList[$i] = ["shortCode" => $company2Response[$i]->kod, "rate" => (double)$company2Response[$i]->oran];

            }

        }

        $response = $comparedList;

        return CustomResponseBuilder::jsonResult("Compared result",null,$response);

    }

    public function getComparedConsoleResponse(){

        $exchangeRate = new ExchangeRate();

        $company1Response = $exchangeRate->getCompanyExchangeRates(new Company1(),"http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0");
        $company2Response = $exchangeRate->getCompanyExchangeRates(new Company2(),"http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3");

        $comparedList = [];

        for ($i = 0; $i < count($company1Response); $i++){

            if($company1Response[$i]->amount < $company2Response[$i]->oran){

                $comparedList[$i] = ["shortCode" => $company1Response[$i]->symbol, "rate" => $company1Response[$i]->amount];

            }
            else{

                $comparedList[$i] = ["shortCode" => $company2Response[$i]->kod, "rate" => (double)$company2Response[$i]->oran];

            }

        }

        $response = $comparedList;

        return CustomResponseBuilder::consoleResult($response);

    }


}
