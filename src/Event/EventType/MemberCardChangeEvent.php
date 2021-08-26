<?php

namespace Blankqwq\Mirai\Event\EventType;

class MemberCardChangeEvent
{
    public $member;
    public $origin;
    public $current;
    public $group;
}