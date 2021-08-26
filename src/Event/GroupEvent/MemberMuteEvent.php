<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class MemberMuteEvent
{
    public $durationSeconds;
    public $member;
    public $operator;
    public $group;
}