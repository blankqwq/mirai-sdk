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

class Enum
{
    public static function __callStatic($name, $arguments)
    {
    }

    public static function getAll(): array
    {
        $self = new \ReflectionClass(self::class);

        return $self->getConstants();
    }

    public static function getTextByValue()
    {
    }

    public static function getValueByText()
    {
    }
}
