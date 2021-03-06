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

class At extends Base
{
    protected $type = 'At';

    public function __construct($target)
    {
        $this->data['target'] = $target;
        parent::__construct();
    }
}
