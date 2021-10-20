<?php

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