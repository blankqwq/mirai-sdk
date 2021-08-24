<?php

namespace Blankqwq\Mirai\Message;

class Message
{
    private $group = [];
    private $sender = [];
    private $messageText = "";
    private $at = [];
    private $image = [];
    private $voice = [];
    private $nudge = [];

    public function __construct()
    {
    }
}