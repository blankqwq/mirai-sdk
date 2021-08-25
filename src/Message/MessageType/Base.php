<?php

namespace Blankqwq\Mirai\Message\MessageType;

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