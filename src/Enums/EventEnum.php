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

class EventEnum
{
    /** @var string Bot登录成功 */
    public const BOT_ONLINE_EVENT = 'BotOnlineEvent';
    /** @var string Bot主动离线 */
    public const BotOfflineEventActive = 'BotOfflineEventActive';
    /** @var string Bot被挤下线 */
    public const BotOfflineEventForce = 'BotOfflineEventForce';
    /** @var string Bot被服务器断开或因网络问题而掉线 */
    public const BotOfflineEventDropped = 'BotOfflineEventDropped';
    /** @var string Bot主动重新登录 */
    public const BotReloginEvent = 'BotReloginEvent';

    /** @var string 好友输入状态改变 */
    public const FriendInputStatusChangedEvent = 'FriendInputStatusChangedEvent';
    /** @var string 好友昵称改变 */
    public const FriendNickChangedEvent = 'FriendNickChangedEvent';
    /** @var string Bot在群里的权限被改变. group.permission Bot在群中的权限，OWNER、ADMINISTRATOR或MEMBER */
    public const BotGroupPermissionChangeEvent = 'BotGroupPermissionChangeEvent';

    /** @var string Bot被禁言 */
    public const BotMuteEvent = 'BotMuteEvent';
    /** @var string Bot被取消禁言 */
    public const BotUnmuteEvent = 'BotUnmuteEvent';
    /** @var string Bot加入了一个新群 */
    public const BotJoinGroupEvent = 'BotJoinGroupEvent';
    /** @var string Bot主动退出一个群 */
    public const BotLeaveEventActive = 'BotLeaveEventActive';
    /** @var string Bot被踢出一个群 */
    public const BotLeaveEventKick = 'BotLeaveEventKick';

    /** @var string 群消息撤回 */
    public const GroupRecallEvent = 'GroupRecallEvent';
    /** @var string 戳一戳事件 */
    public const NudgeEvent = 'NudgeEvent';
    /** @var string 某个群名改变 */
    public const GroupNameChangeEvent = 'GroupNameChangeEvent';
}
