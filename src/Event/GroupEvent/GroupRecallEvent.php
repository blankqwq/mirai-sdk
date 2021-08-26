<?php

namespace Blankqwq\Mirai\Event\GroupEvent;

class GroupRecallEvent extends GroupBaseEvent
{
    public $authorId;
    public $messageId;
    public $time;
}