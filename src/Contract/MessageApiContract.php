<?php

namespace Blankqwq\Mirai\Contract;

interface MessageApiContract
{
    public function sendFriendMsg($user_id, $message, $messageChain = false);
    public function sendTempMsg($user_id, $message, $messageChain = false);
    public function sendGroupMsg($group_id, $messageChain = [], $messageId = null);
    public function sendNudge($user_id, $subject, string $kind = 'group');
    public function deleteMsg($message_id);
    public function recall($message_id);
    public function getMessage($message_id);
}