<?php

namespace Blankqwq\Mirai\Event\EventType;

class MemberJoinRequestEvent
{
    public $eventId;
    public $fromId;
    public $groupId;
    public $groupName;
    public $nick;
    public $message;
}