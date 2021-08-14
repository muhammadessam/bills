<?php

namespace App\Facades;

use App\Helper\Msegat;
use Illuminate\Support\Facades\Facade;


/**
 * @method send(string $number, string $msg)
 * @see Msegat
 */
class MsegatFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'msg';
    }
}
