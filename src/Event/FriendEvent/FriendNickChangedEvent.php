<?php

namespace Blankqwq\Mirai\Event\FriendEvent;

class FriendNickChangedEvent extends FriendBaseEvent
{
    public $from;
    public $to;

    public function __construct($friend, $from, $to)
    {
        $this->from = $from;
        $this->to = $to;
        parent::__construct($friend);
    }
}