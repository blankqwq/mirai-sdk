<?php

namespace Blankqwq\Mirai\Event\EventType;

use Blankqwq\Mirai\Event\Event;

class GroupNameChangeEvent extends Event
{
    public $origin;
    public $current;
    public $operator;
    public $group;
}