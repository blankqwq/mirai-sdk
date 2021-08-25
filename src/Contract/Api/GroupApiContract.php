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

interface GroupApiContract
{
    public function getGroupMembers($target);

    public function getGroups();

    public function getGroupMemInfo($target, $memberId);

    public function muteMember($target, $member, $time);

    public function unMuteMember($target, $member);

    public function deleteMember($target, $member, $msg);

    public function muteAll($target);

    public function unMuteAll($target);

    public function quiteGroup($target);

    public function setEssence($message_id);

    public function getGroupConfig($groupId);

    public function setGroupConfig($groupId, $config);

    public function getGroupMember($target, $memberId);

    public function setGroupMember($target, $memberId, $info);

    public function addGroupRequest($eventId, $fromId, $groupId, $operate = 0, $message = '');
}
