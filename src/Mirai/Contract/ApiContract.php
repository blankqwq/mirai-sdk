<?php

namespace Blankqwq\Mirai\Contract;

interface ApiContract
{
    public function __construct($qq, $host, $verify = '', $tty = 7200);
}