<?php

namespace Blankqwq\Mirai\Event\EventType;

class GroupAllowConfessTalkEvent
{
    public $origin;
    public $current;
    public $isByBot;
    public $group;
    public $operator;
}