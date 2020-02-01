<?php


namespace App\Providers\ExchangeAdapterProvider;


use App\Library\ExchangeRate\IExchangeRate;
use GuzzleHttp\Client;

class Company1 implements IExchangeRate
{

    protected $_apiUrl;

    public function setApiUrl($apiUrl)
    {
        // TODO: Implement setProviderURL() method.

        $this->_apiUrl = $apiUrl;

    }

    public function getProviderResponse()
    {
        // TODO: Implement getProviderResponse() method.

        $client = new Client();

        $response = $client->request("GET",$this->_apiUrl);

        return $response->getBody()->getContents();

    }

    public function giveDataResult($data,$function = null)
    {
        // TODO: Implement compareDataResult() method.

        $providerResponse = $this->getProviderResponse();

        $providerResponse = json_decode($providerResponse);

        return $providerResponse->result;

    }

}
