<?php

namespace Blankqwq\Mirai\Event\EventType;

class GroupAllowMemberInviteEvent
{
    public $origin;
    public $current;
    public $operator;
    public $group;
}