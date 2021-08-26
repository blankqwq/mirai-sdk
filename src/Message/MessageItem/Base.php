<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Message\MessageItem;

use Blankqwq\Mirai\Contract\MessageTypeContract;

class Base implements MessageTypeContract
{
    protected $type = '';
    protected $data = [];

    public function __construct()
    {
        $this->data['type'] = $this->type;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
