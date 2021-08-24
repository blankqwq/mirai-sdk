<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Exceptions;

use Throwable;

class MiraiHttpException extends \Exception
{
    public function __construct($code = 0, $message = 'Mirai return code err', Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
