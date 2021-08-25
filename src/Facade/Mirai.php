<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Facade;

use Blankqwq\Mirai\Contract\ApiContract;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Blankqwq\Mirai\Mirai
 * @see ApiContract
 */
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