<?php

namespace Blankqwq\Mirai\Event\FriendEvent;

class NewFriendRequestEvent
{
    public $eventId;
    public $fromId;
    public $groupId;
    public $nick;
    public $message;
}