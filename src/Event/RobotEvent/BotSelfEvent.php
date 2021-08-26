<?php

namespace Blankqwq\Mirai\Event\RobotEvent;

use Blankqwq\Mirai\Event\Event;

abstract class BotSelfEvent extends Event
{
    public $qq;

    public function __construct($qq)
    {
        $this->qq = $qq;
    }
}