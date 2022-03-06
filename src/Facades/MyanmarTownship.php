<?php

namespace HtetMyatHlaing\MyanmarTownships\Facades;

use Illuminate\Support\Facades\Facade;

class MyanmarTownship extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'myanmartownships';
    }
}
