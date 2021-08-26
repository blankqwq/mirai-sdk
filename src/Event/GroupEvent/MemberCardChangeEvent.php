<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class MemberCardChangeEvent
{
    public $member;
    public $origin;
    public $current;
    public $group;
}