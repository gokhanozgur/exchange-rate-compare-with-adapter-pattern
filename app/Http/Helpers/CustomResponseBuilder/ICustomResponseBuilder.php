<?php


namespace App\Http\Helpers\CustomResponseBuilder;


interface ICustomResponseBuilder
{

    public static function jsonResult($message = "", $errorCode = null, $data = null);

    public static function consoleResult(array $data);

}
