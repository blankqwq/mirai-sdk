<?php

namespace Blankqwq\Mirai\Event\EventType;

class GroupAllowAnonymousChatEvent
{
    public $origin;
    public $current;
    public $group;
    public $operator;
}