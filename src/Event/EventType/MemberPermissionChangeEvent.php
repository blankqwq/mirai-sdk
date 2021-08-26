<?php

namespace Blankqwq\Mirai\Event\EventType;

class MemberPermissionChangeEvent
{
    public $member;
    public $origin;
    public $current;
    public $group;
}