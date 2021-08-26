<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class MemberSpecialTitleChangeEvent
{
    public $member;
    public $origin;
    public $current;
    public $group;
}