<?php


namespace App\Library\ExchangeRate;


use App\Http\Helpers\CustomResponseBuilder\CustomResponseBuilder;

class ExchangeRate
{

    public function getCompanyExchangeRates(IExchangeRate $IExchangeRate,$apiUrl){

        $IExchangeRate->setApiUrl($apiUrl);
        $providerResponse = $IExchangeRate->getProviderResponse();
        return $IExchangeRate->giveDataResult($providerResponse);

    }

    public function compareRates(array $array,array $otherArray){

        $comparedList = [];

        for ($i = 0; $i < count($array); $i++){

            if($array[$i]["rate"] < $otherArray[$i]["rate"]){

                $comparedList[$i] = array("shortCode" => $array[$i]["shortCode"], "rate" => $array[$i]["rate"]);

            }
            else{

                $comparedList[$i] = array("shortCode" => $otherArray[$i]["shortCode"], "rate" => $otherArray[$i]["rate"]);

            }

        }

        return $comparedList;

    }

    public function compareRateFromMultipleArray(array $multipleArray){

        $minExchangeRateData[] = $multipleArray[0];

        for ($i = 1; $i < count($multipleArray);$i++){

            $minExchangeRateData[0] = $this->compareRates($minExchangeRateData[0],$multipleArray[$i]);

        }

        return $minExchangeRateData[0];

    }

    public function getComparedJson($data){

        return CustomResponseBuilder::jsonResult("Compared result",null,$data);

    }

    public function getComparedConsoleResult($data){

        return CustomResponseBuilder::consoleResult($data);

    }

}
