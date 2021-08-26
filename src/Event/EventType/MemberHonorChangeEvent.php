<?php

namespace Blankqwq\Mirai\Event\EventType;

class MemberHonorChangeEvent
{
    public $member;
    public $group;
    public $action;
    public $honor;
}