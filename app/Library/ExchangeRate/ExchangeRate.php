<?php


namespace App\Library\ExchangeRate;


use App\Http\Helpers\CustomResponseBuilder\CustomResponseBuilder;
use App\Providers\ExchangeAdapterProvider\Company1;
use App\Providers\ExchangeAdapterProvider\Company2;

class ExchangeRate
{

    public function getCompanyExchangeRates(IExchangeRate $IExchangeRate,$apiUrl){

        $IExchangeRate->setApiUrl($apiUrl);
        $providerResponse = $IExchangeRate->getProviderResponse();
        return $response = $IExchangeRate->giveDataResult($providerResponse);

    }

    public function getComparedJson($data){

        return CustomResponseBuilder::jsonResult("Compared result",null,$data);

    }

    public function getComparedConsoleResult($data){

        return CustomResponseBuilder::consoleResult($data);

    }

}
