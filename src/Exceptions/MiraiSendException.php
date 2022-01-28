<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Exceptions;


use Throwable;

class MiraiSendException extends \Exception
{
    public $data;

    public function __construct($code, $data, $message = 'Mirai return code err')
    {
        parent::__construct($message, $code, null);
        $this->data = $data;
    }
}
