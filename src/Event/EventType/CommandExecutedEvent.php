<?php

namespace Blankqwq\Mirai\Event\EventType;

class CommandExecutedEvent
{
    public $name;
    public $friend;
    public $member;
    public $args;
}