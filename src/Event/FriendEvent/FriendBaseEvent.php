<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Event\FriendEvent;

use Blankqwq\Mirai\Event\Event;

abstract class FriendBaseEvent extends Event
{
    public $friend = [];

    public function __construct($friend)
    {
        $this->friend = $friend;
    }
}
