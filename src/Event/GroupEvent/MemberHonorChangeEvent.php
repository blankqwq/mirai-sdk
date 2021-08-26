<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class MemberHonorChangeEvent
{
    public $member;
    public $group;
    public $action;
    public $honor;
}