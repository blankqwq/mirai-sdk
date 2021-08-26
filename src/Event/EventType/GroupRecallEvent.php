<?php

namespace Blankqwq\Mirai\Event\EventType;

class GroupRecallEvent
{
    public $authorId;
    public $messageId;
    public $time;
    public $group;
    public $operator;
}