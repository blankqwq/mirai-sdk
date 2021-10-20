<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\StatusRoute\Status;

/**
 * @Serialize 实例化status
 */
class Serialize
{
    public static function parse($string): StatusItem
    {
        return new StatusItem();
    }

    public static function stringify(StatusItem $statusItem): string
    {
        // 写入状态管理
        return '';
    }
}
