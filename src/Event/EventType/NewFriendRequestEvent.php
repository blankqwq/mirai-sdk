<?php

namespace Blankqwq\Mirai\Event\EventType;

class NewFriendRequestEvent
{
    public $eventId;
    public $fromId;
    public $groupId;
    public $nick;
    public $message;
}