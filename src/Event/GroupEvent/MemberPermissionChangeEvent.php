<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class MemberPermissionChangeEvent
{
    public $member;
    public $origin;
    public $current;
    public $group;
}