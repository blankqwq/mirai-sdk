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

use Blankqwq\Mirai\Message\MessageItem\Base;

class MiraiCode extends Base
{
    protected $type = 'MiraiCode';

    public function __construct($code)
    {
        $this->data['code'] = $code;
        parent::__construct();
    }
}
