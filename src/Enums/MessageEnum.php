<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Enums;

class MessageEnum
{
    public const MESSAGE_TYPE = [
        'FriendMessage','GroupMessage',
        'TempMessage','StrangerMessage',
        'OtherClientMessage',

        'BotGroupPermissionChangeEvent',
        'BotMuteEvent',
        'BotUnmuteEvent',
        'BotJoinGroupEvent',
        'BotLeaveEventActive',
        'BotLeaveEventKick',
        'GroupRecallEvent',
        'FriendRecallEvent',
        'NudgeEvent',
        'GroupNameChangeEvent',
        'GroupEntranceAnnouncementChangeEvent',
        'GroupMuteAllEvent',
        'GroupAllowAnonymousChatEvent',
        'GroupAllowConfessTalkEvent',
        'GroupAllowMemberInviteEvent',
        'MemberJoinEvent',
        'MemberLeaveEventKick',
        'MemberLeaveEventQuit',
        'MemberCardChangeEvent',
        'MemberSpecialTitleChangeEvent',
        'MemberPermissionChangeEvent',
        'MemberMuteEvent',
        'MemberUnmuteEvent',
        'MemberHonorChangeEvent',
        'NewFriendRequestEvent',
        'MemberJoinRequestEvent',
        'BotInvitedJoinGroupRequestEvent',
        'CommandExecutedEvent'
    ];

    public const EVENT_TYPE = [

    ];

    public const ROBOT_EVENT = [
        '','','BotOfflineEventForce','BotOfflineEventDropped',
        'BotReloginEvent','FriendInputStatusChangedEvent','FriendNickChangedEvent'
    ];
}
