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

use Illuminate\Support\Arr;

class Message
{
    public $type;
    public $id;
    public $format = '';
    public $text = '';
    public $at = [];
    public $image = [];
    public $voice = [];
    public $group = [];
    public $sender = [];
    public $messageChain = [];
    public $other=[];
    public $origin = [];

    public function __construct($type, $data = [])
    {
        $this->origin = $data;
        $this->type = $type;
        $this->parse();
        $this->parseToProperty();
    }

    public function parse()
    {
        $this->sender = $this->getOrigin('sender');
        $this->group = $this->getOrigin('sender.group');
        $messageChain = $this->getOrigin('messageChain');
        $this->id = array_shift($messageChain)['id'];
        $this->messageChain = $messageChain;
    }

    private function parseToProperty(){
        foreach ($this->messageChain as $item){
            $type = strtolower($item['type']);
            $this->$type($item);
        }
    }

    public function getOrigin($key, $default = [])
    {
        $key = explode('.', $key);
        $data = $this->origin;
        foreach ($key as $item) {
            if (!isset($data[$item])) {
                return $default;
            }
            $data = $data[$item];
        }
        return $data;
    }

    private function plain($item){
        $this->text.=$item['text'];
    }

    public function __call($name, $arguments)
    {
        if (isset($this->$name)){
            $this->$name[]=$arguments;
        }else{
            $this->other[] = $arguments;
        }
    }

    public function formatMiraiCode(): string
    {
        // MessageChain => MiraiCode
        return '';
    }

}
