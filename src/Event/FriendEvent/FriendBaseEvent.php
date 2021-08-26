<?php

namespace Blankqwq\Mirai\Event\FriendEvent;

use Blankqwq\Mirai\Event\Event;

abstract class FriendBaseEvent extends Event
{
    public $friend=[];

    public function __construct($friend)
    {
        $this->friend = $friend;
    }
}