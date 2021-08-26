<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

use Blankqwq\Mirai\Event\Event;

abstract class GroupBaseEvent extends Event
{
    public $group;
    public $operator;
}