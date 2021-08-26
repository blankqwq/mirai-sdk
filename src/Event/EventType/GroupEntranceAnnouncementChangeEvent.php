<?php

namespace Blankqwq\Mirai\Event\EventType;

class GroupEntranceAnnouncementChangeEvent
{
    public $origin;
    public $current;
    public $operator;
    public $group;
}