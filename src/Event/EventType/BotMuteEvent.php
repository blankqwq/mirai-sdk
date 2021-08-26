<?php

namespace Blankqwq\Mirai\Event\EventType;

class BotMuteEvent
{
    public $durationSeconds;
    public $operator;
    public $group;
}