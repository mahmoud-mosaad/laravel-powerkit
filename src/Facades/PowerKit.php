<?php

namespace MahmoudMosaad\PowerKit\Facades;

use Illuminate\Support\Facades\Facade;

class PowerKit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'powerkit';
    }
}
