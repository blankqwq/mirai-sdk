<?php

namespace Blankqwq\Mirai\Event\EventType;

class MemberMuteEvent
{
    public $durationSeconds;
    public $member;
    public $operator;
    public $group;
}