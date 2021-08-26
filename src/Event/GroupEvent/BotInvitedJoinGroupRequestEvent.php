<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class BotInvitedJoinGroupRequestEvent
{
    public $eventId;
    public $fromId;
    public $groupId;
    public $groupName;
    public $nick;
    public $message;
}