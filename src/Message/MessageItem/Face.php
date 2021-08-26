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

class Face extends Base
{
    protected $type = 'Face';

    public function __construct($name)
    {
        $this->data['name'] = $name;
        parent::__construct();
    }
}
