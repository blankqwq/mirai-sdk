<?php

namespace Blankqwq\Mirai\Event\EventType;

class MemberSpecialTitleChangeEvent
{
    public $member;
    public $origin;
    public $current;
    public $group;
}