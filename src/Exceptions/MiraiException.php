<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Exceptions;

use Throwable;

class MiraiException extends \Exception
{
    private $messageCode = [
        0 => '正常',
        1 => '错误的verify key',
        2 => '指定的Bot不存在',
        3 => 'Session失效或不存在',
        4 => 'Session未认证(未激活)',
        5 => '发送消息目标不存在(指定对象不存在)',
        6 => '指定文件不存在，出现于发送本地图片',
        10 => '无操作权限，指Bot没有对应操作的限权',
        20 => 'Bot被禁言，指Bot当前无法向指定群发送消息',
        30 => '消息过长',
        400 => '错误的访问，如参数错误等',
    ];

    public function __construct($code = 0, Throwable $previous = null)
    {
        parent::__construct($this->messageCode[$code] ?? 'Mirai 未知错误', $code, $previous);
    }
}
