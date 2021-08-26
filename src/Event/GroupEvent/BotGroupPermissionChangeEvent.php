<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class BotGroupPermissionChangeEvent extends GroupBaseEvent
{
    public $origin;
    public $current;

}