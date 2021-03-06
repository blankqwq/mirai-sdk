<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Event\EventType;

 use Blankqwq\Mirai\Event\Event;

class MemberSpecialTitleChangeEvent extends Event
{
    public $member;
    public $origin;
    public $current;
    public $group;
}
