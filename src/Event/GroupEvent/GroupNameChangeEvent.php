<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class GroupNameChangeEvent extends GroupBaseEvent
{
    public $origin;
    public $current;
}