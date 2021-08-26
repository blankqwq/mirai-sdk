<?php

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