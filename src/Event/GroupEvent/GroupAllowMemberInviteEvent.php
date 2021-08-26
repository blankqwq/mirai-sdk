<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class GroupAllowMemberInviteEvent extends GroupBaseEvent
{
    public $origin;
    public $current;
}