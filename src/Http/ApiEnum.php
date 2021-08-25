<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Http;

class ApiEnum
{
    // 插件信息
    public const VERIFY = '/verify';
    public const ABOUT = '/about';
    public const COMMAND = '/command';
    public const BIND = '/bind';
    public const RELEASE = '/release';
    public const COUNT_MESSAGE = '/countMessage';
    // 获取其他相关
    public const GET_MESSAGE = '/messageFromId';
    public const GET_ROBOT = '/botProfile';
    //获取账户
    public const GET_FRIENDS = '/friendList';
    public const GET_FRIEND_INFO = '/friendProfile';

    // 获取群相关
    public const GET_GROUPS = '/groupList';
    public const GET_GROUP_MEMBERS = '/memberList';
    public const GET_GROUP_MEMBER_INFO = '/memberProfile';

    // 消息相关
    public const SEND_FRIEND_MESSAGE = '/sendFriendMessage';
    public const SEND_GROUP_MESSAGE = '/sendGroupMessage';
    public const SEND_TEMP_MESSAGE = '/sendTempMessage';
    public const SEND_NUDGE = '/sendNudge';
    public const RECALL = '/recall';

    // 朋友操作
    public const DELETE_FRIEND = '/deleteFriend';

    // 群操作
    public const MUTE = '/mute';
    public const UNMUTE = '/unmute';
    public const DELETE_GROUP_MEMBER = '/kick';
    public const QUIT_GROUP = '/quit';
    public const MUTE_ALL = '/muteAll';
    public const UNMUTE_ALL = '/unmuteAll';
    public const SET_ESSENCE = '/setEssence';
    public const GROUP_CONFIG = '/groupConfig';
    public const MEMBER_INFO = '/memberInfo';

    public const ADD_FRIEND_REQUEST = '/resp/newFriendRequestEvent';
    public const ADD_GROUP_MEMBER_REQUEST = '/resp/memberJoinRequestEvent';
    public const INVITE_ROBOT_REQUEST = '/resp/botInvitedJoinGroupRequestEvent';

    // 文件操作
    public const GET_FILE_LIST = '/file/list';
    public const GET_FILE_INFO = '/file/info';
    public const MAKE_DIR = '/file/mkdir';
    public const DELETE_FILE = '/file/delete';
    public const MOVE_FILE = '/file/move';
    public const RENAME_FILE = '/file/rename';

    public const UPLOAD_FILE = '/uploadImage';
    public const UPLOAD_VOICE = '/uploadVoice';
    public const UPLOAD_FILE_TO_GROUP = '/file/upload';
}
