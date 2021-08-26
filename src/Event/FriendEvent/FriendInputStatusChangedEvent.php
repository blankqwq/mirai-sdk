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

class FriendInputStatusChangedEvent extends FriendBaseEvent
{
    public $inputting;

    public function __construct($friend, $inputting)
    {
        $this->inputting = $inputting;
        parent::__construct($friend);
    }
}
