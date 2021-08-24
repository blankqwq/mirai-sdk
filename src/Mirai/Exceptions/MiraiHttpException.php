<?php

namespace Blankqwq\Exceptions;

use Throwable;

class MiraiHttpException extends \Exception
{
    public function __construct($code = 0, $message = "Mirai return code err", Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}