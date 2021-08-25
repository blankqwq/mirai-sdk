<?php

namespace Blankqwq\Mirai\Exceptions;

use Throwable;

class ParseMessageException extends \Exception
{
    public function __construct( $code = 0, Throwable $previous = null)
    {
        parent::__construct("Parse Message Error", $code, $previous);
    }
}