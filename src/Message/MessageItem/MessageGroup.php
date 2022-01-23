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

class MessageGroup implements MessageTypeContract, \ArrayAccess
{
    protected $data = [];

    public function __construct(...$data)
    {
        $this->data = $data;
    }

    public function add(MessageTypeContract $message)
    {
        $this->data[] = $message;

        return $this;
    }

    public function getData(): array
    {
        return array_map(function ($item) {
            return $item->getData();
        }, $this->data);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return $this->data[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
