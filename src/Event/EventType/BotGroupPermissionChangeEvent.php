<?php

namespace Blankqwq\Mirai\Event\EventType;

class BotGroupPermissionChangeEvent
{
    public $origin;
    public $current;
    public $group;
}