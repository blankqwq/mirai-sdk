<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Contract;

interface MiraiApiContract extends ApiContract
{
    public function __construct($qq, $host, $verify = '', $tty = 7200);

    public function getSessionKey($clear = false);

    public function verify($verify);

    public function bind($qq, $sessionKey);

    public function release($qq, $sessionKey);

    public function countMessage(): array;

    public function about(): array;

    public function parseMessage($message);
}
