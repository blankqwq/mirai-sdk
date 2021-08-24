<?php

namespace Blankqwq\Mirai\Facade;

use Illuminate\Support\Facades\Facade;

class Mirai extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mirai';
    }
}
