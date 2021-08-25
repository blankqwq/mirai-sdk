<?php

namespace Blankqwq\Mirai\Contract;

interface ManageApiContract
{
    public function deleteFriend($target);

    public function solveAddFriend($eventId, $fromId, $groupId, $operate = 0, $message = '');

    public function solveInviteGroupRequest($eventId, $fromId, $groupId, $operate = 0, $message = '');

    public function command($command);

    public function getFriendList();

    public function getRobotInfo();

    public function getFriends();

    public function getFriendInfo($target);
}