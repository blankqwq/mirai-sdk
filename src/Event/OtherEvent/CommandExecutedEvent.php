<?php

namespace Blankqwq\Mirai\Event\OtherEvent;

class CommandExecutedEvent
{
    public $name;
    public $friend;
    public $member;
    public $args;
}