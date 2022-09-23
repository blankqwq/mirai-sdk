<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Drivers\Mirai\Base\Traits;

use Blankqwq\Mirai\Enums\MiraiApiEnum;

trait GroupManageAPi
{
    public function getGroupMembers($target)
    {
        $param = [
            'target' => $target,
        ];

        return $this->query(MiraiApiEnum::GET_GROUP_MEMBERS, $param);
    }

    public function getGroups()
    {
        return $this->query(MiraiApiEnum::GET_GROUPS);
    }

    public function getGroupMemInfo($target, $memberId)
    {
        $param = [
            'target' => $target,
            'memberId' => $memberId,
        ];

        return $this->query(MiraiApiEnum::GET_GROUP_MEMBER_INFO, $param);
    }

    public function muteMember($target, $member, $time)
    {
        $param = [
            'target' => $target,
            'member' => $member,
            'time' => $time,
        ];

        return $this->post(MiraiApiEnum::MUTE, $param);
    }

    public function unMuteMember($target, $member)
    {
        $param = [
            'target' => $target,
            'member' => $member,
        ];

        return $this->post(MiraiApiEnum::UNMUTE, $param);
    }

    public function deleteMember($target, $member, $msg)
    {
        $param = [
            'target' => $target,
            'member' => $member,
            'msg' => $msg,
        ];

        return $this->post(MiraiApiEnum::DELETE_GROUP_MEMBER, $param);
    }

    public function muteAll($target)
    {
        $param = [
            'target' => $target,
        ];

        return $this->post(MiraiApiEnum::MUTE_ALL, $param);
    }

    public function unMuteAll($target)
    {
        $param = [
            'target' => $target,
        ];

        return $this->post(MiraiApiEnum::UNMUTE_ALL, $param);
    }

    public function quiteGroup($target)
    {
        $param = [
            'target' => $target,
        ];

        return $this->post(MiraiApiEnum::QUIT_GROUP, $param);
    }

    public function setEssence($message_id)
    {
        $param = [
            'target' => $message_id,
        ];

        return $this->post(MiraiApiEnum::SET_ESSENCE, $param);
    }

    public function getGroupConfig($groupId)
    {
        $param = [
            'target' => $groupId,
        ];

        return $this->query(MiraiApiEnum::GROUP_CONFIG, $param);
    }

    /**
     * @param $groupId
     * @param $config
     * confessTalk    true    Boolean    true    是否开启坦白说
     * allowMemberInvite    true    Boolean    true    是否允许群员邀请
     * autoApprove    true    Boolean    true    是否开启自动审批入群
     * anonymousChat    true    Boolean    true    是否允许匿名聊天
     *
     * @return mixed
     */
    public function setGroupConfig($groupId, $config)
    {
        $param = [
            'target' => $groupId,
            'config' => $config,
        ];

        return $this->post(MiraiApiEnum::GROUP_CONFIG, $param);
    }

    /***
     * @param $target
     * @param $memberId
     * @return array
     * @throws \Blankqwq\Exceptions\MiraiHttpException
     * @throws \Blankqwq\Mirai\Exceptions\MiraiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGroupMember($target, $memberId)
    {
        $param = [
            'target' => $target,
            'memberId' => $memberId,
        ];

        return $this->query(MiraiApiEnum::MEMBER_INFO, $param);
    }

    /**
     * @param $target
     * @param $memberId
     * @param $info
     *
     * @return mixed|null
     *
     * @throws \Exception
     *                    "name": "群名片",
     *                    "specialTitle": "群头衔"
     */
    public function setGroupMember($target, $memberId, $info)
    {
        $param = [
            'target' => $target,
            'memberId' => $memberId,
            'info' => $info,
        ];

        return $this->post(MiraiApiEnum::MEMBER_INFO, $param);
    }

    /**+
     * @param $eventId
     * @param $fromId
     * @param $groupId
     * @param int $operate
     * @param string $message
     * @return mixed
     * {
     * "sessionKey":"YourSessionKey",
     * "eventId":12345678,
     * "fromId":123456,
     * "groupId":654321,
     * "operate":0,
     * "message":""
     * }
     */
    public function addGroupRequest($eventId, $fromId, $groupId, $operate = 0, $message = '')
    {
        $param = [
            'eventId' => $eventId,
            'fromId' => $fromId,
            'groupId' => $groupId,
            'operate' => $operate,
            'message' => $message,
        ];

        return $this->post(MiraiApiEnum::ADD_GROUP_MEMBER_REQUEST, $param);
    }
}
