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
