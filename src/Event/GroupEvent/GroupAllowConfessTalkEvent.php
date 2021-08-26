<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class GroupAllowConfessTalkEvent extends GroupBaseEvent
{
    public $origin;
    public $current;
    public $isByBot;
}