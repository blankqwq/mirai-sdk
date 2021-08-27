<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Message;

class Message
{
    public $group = [];
    public $sender = [];
    public $messageText = '';
    public $at = [];
    public $image = [];
    public $voice = [];
    public $origin = [];

    public function __construct($data)
    {
        $this->origin = $data;
    }
}
