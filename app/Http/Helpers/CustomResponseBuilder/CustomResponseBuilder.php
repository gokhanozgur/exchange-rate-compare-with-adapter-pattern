<?php


namespace App\Http\Helpers\CustomResponseBuilder;

use BenSampo\Enum\Enum;

final class ErrorCode extends Enum
{
    const Failed    = 1;
}

class CustomResponseBuilder implements ICustomResponseBuilder
{
    public static function jsonResult($message = "", $errorCode = null, $data = null){

        if(is_null($errorCode)){

            return [
                "success"       => true,
                "message"       => $message,
                "error_code"    => 0,
                "data"          => $data,
            ];

        }
        else{

            return [
                "success"       => false,
                "message"       => $message,
                "error_code"    => $errorCode,
                "data"          => $data,
            ];

        }

    }

    public static function consoleResult($data){

        $stringResult = "";

         foreach ($data as $datum){

             $stringResult .= $datum["shortCode"]." : ".$datum["rate"]."<br>";

         }

         return $stringResult;

    }

}
