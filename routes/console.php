<?php

use App\Library\ExchangeRate\ExchangeRate;
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



});
