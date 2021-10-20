<?php

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