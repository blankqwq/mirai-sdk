<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Contract\Api;

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
