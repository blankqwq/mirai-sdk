<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Http\Traits;

use Blankqwq\Mirai\Http\ApiEnum;

trait ManageApi
{
    /**
     * @param $target
     * @return array
     * @throws \Blankqwq\Exceptions\MiraiHttpException
     * @throws \Blankqwq\Mirai\Exceptions\MiraiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteFriend($target)
    {
        $param = [
            'target' => $target,
        ];

        return $this->post(ApiEnum::DELETE_FRIEND, $param);
    }

    /**
     * @param $eventId
     * @param $fromId
     * @param $groupId
     * @param int $operate
     * @param string $message
     * @return array
     * @throws \Blankqwq\Exceptions\MiraiHttpException
     * @throws \Blankqwq\Mirai\Exceptions\MiraiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function solveAddFriend($eventId, $fromId, $groupId, $operate = 0, $message = '')
    {
        $param = [
            'eventId' => $eventId,
            'fromId' => $fromId,
            'groupId' => $groupId,
            'operate' => $operate,
            'message' => $message,
        ];

        return $this->post(ApiEnum::ADD_FRIEND_REQUEST, $param);
    }

    /**
     * @param $eventId
     * @param $fromId
     * @param $groupId
     * @param int $operate
     * @param string $message
     * @return array
     * @throws \Blankqwq\Exceptions\MiraiHttpException
     * @throws \Blankqwq\Mirai\Exceptions\MiraiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function solveInviteGroupRequest($eventId, $fromId, $groupId, $operate = 0, $message = '')
    {
        $param = [
            'eventId' => $eventId,
            'fromId' => $fromId,
            'groupId' => $groupId,
            'operate' => $operate,
            'message' => $message,
        ];

        return $this->post(ApiEnum::INVITE_ROBOT_REQUEST, $param);
    }

    /**
     * @param $command
     *
     * @return mixed
     */
    public function command($command)
    {
        $param = [
            'command' => $command,
        ];

        return $this->post(ApiEnum::COMMAND, $param);
    }

    /**
     * @return array
     * @throws \Blankqwq\Exceptions\MiraiHttpException
     * @throws \Blankqwq\Mirai\Exceptions\MiraiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFriendList()
    {
        return $this->query(ApiEnum::GET_FRIENDS);
    }

    /**
     * @return mixed|null
     *
     * @throws \Exception|\GuzzleHttp\Exception\GuzzleException
     *                    "nickname":"nickname",
     *                    "email":"email",
     *                    "age":18,
     *                    "level":1,
     *                    "sign":"mirai",
     *                    "sex":"UNKNOWN" // UNKNOWN, MALE, FEMALE
     */
    public function getRobotInfo()
    {
        return $this->query(ApiEnum::GET_ROBOT);
    }

    /**
     * @return array
     */
    public function getFriends()
    {
        return $this->getFriendList();
    }

    /**
     * @param $target
     * @return array
     * @throws \Blankqwq\Exceptions\MiraiHttpException
     * @throws \Blankqwq\Mirai\Exceptions\MiraiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFriendInfo($target)
    {
        $param = [
            'target' => $target,
        ];

        return $this->query(ApiEnum::GET_FRIEND_INFO, $param);
    }
}
