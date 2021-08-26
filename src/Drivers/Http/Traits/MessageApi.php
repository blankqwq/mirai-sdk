<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Drivers\Http\Traits;

use Blankqwq\Mirai\Drivers\Http\ApiEnum;

trait MessageApi
{
    /**
     * @param $user_id
     * @param $message
     * @param false $messageChain
     *
     * @return mixed
     */
    public function sendFriendMsg($user_id, $message, $messageChain = false)
    {
        $param = [
            'target' => $user_id,
            'quote' => $message,
            'messageChain' => $messageChain,
        ];

        return $this->post(ApiEnum::SEND_FRIEND_MESSAGE, $param);
    }

    /**
     * @param $user_id
     * @param $message
     * @param false $messageChain
     *
     * @return mixed
     */
    public function sendTempMsg($user_id, $message, $messageChain = false)
    {
        $param = [
            'target' => $user_id,
            'quote' => $message,
            'messageChain' => $messageChain,
        ];

        return $this->post(ApiEnum::SEND_TEMP_MESSAGE, $param);
    }

    /**
     * @param $group_id
     * @param false $messageChain
     * @param null  $messageId
     *
     * @return mixed
     *
     * @throws \Blankqwq\Exceptions\MiraiHttpException
     * @throws \Blankqwq\Mirai\Exceptions\MiraiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendGroupMsg($group_id, $messageChain = [], $messageId = null)
    {
        $param = [
            'target' => $group_id,
            'messageChain' => $messageChain,
            'quote' => $messageId,
        ];

        return $this->post(ApiEnum::SEND_GROUP_MESSAGE, $param);
    }

    /**
     * @param $user_id
     * @param $subject
     *
     * @return array
     *
     * @throws \Blankqwq\Exceptions\MiraiHttpException
     * @throws \Blankqwq\Mirai\Exceptions\MiraiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendNudge($user_id, $subject, string $kind = 'group')
    {
        $param = [
            'target' => $user_id,
            'subject' => $subject,
            'kind' => $kind,
        ];

        return $this->post(ApiEnum::SEND_NUDGE, $param);
    }

    /**
     * @param $message_id
     *
     * @return array
     */
    public function deleteMsg($message_id)
    {
        $param = [
            'target' => $message_id,
        ];

        return $this->post(ApiEnum::RECALL, $param);
    }

    /**
     * @param $message_id
     *
     * @return mixed
     */
    public function recall($message_id)
    {
        return $this->deleteMsg($message_id);
    }

    /**
     * @param $message_id
     *
     * @return mixed|null
     *
     * @throws \Exception|\GuzzleHttp\Exception\GuzzleException
     */
    public function getMessage($message_id)
    {
        $param = [
            'target' => $message_id,
        ];

        return $this->query(ApiEnum::GET_MESSAGE, $param);
    }
}
