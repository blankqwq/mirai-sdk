<?php

namespace Blankqwq\Mirai\Http\Traits;

use Blankqwq\Mirai\Http\ApiEnum;

trait ManageApi
{
    public function deleteFriend($target)
    {
        $param = [
            'target' => $target,
        ];
        return $this->post(ApiEnum::DELETE_FRIEND, $param);
    }

    public function solveAddFriend($eventId, $fromId, $groupId, $operate = 0, $message = "")
    {
        $param = [
            "eventId" => $eventId,
            "fromId" => $fromId,
            "groupId" => $groupId,
            "operate" => $operate,
            "message" => $message,
        ];
        return $this->post(ApiEnum::ADD_FRIEND_REQUEST, $param);
    }

    public function solveInviteGroupRequest($eventId, $fromId, $groupId, $operate = 0, $message = "")
    {
        $param = [
            "eventId" => $eventId,
            "fromId" => $fromId,
            "groupId" => $groupId,
            "operate" => $operate,
            "message" => $message,
        ];
        return $this->post(ApiEnum::INVITE_ROBOT_REQUEST, $param);
    }

    /**
     * @param $command
     * @return mixed
     */
    public function command($command)
    {
        $param = [
            "command" => $command,
        ];
        return $this->post(ApiEnum::COMMAND, $param);
    }


    public function getFriendList()
    {
        return $this->query(ApiEnum::GET_FRIENDS);
    }


    /**
     * @return mixed|null
     * @throws \Exception
     * "nickname":"nickname",
     * "email":"email",
     * "age":18,
     * "level":1,
     * "sign":"mirai",
     * "sex":"UNKNOWN" // UNKNOWN, MALE, FEMALE
     */
    public function getRobotInfo()
    {
        return $this->query(ApiEnum::GET_ROBOT);
    }

    public function getFriends()
    {
        return $this->getFriendList();
    }

    public function getFriendInfo($target)
    {
        $param = [
            "target" => $target,
        ];
        return $this->query(ApiEnum::GET_FRIEND_INFO, $param);

    }


}