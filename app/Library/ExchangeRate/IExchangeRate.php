<?php


namespace App\Library\ExchangeRate;


interface IExchangeRate
{

    public function setApiUrl ($providerURL);

    public function getProviderResponse();

    public function giveDataResult($data);

}
