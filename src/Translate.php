<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai;

use Blankqwq\Mirai\Enums\MessageEnum;
use Blankqwq\Mirai\Event\Event;
use Blankqwq\Mirai\Message\Message;

class Translate
{

    public const EVENT_NAME_SPACE = 'Blankqwq\Mirai\Event\EventType\\';

    /**
     * @param $request
     *
     * @return Event|Message
     *
     * @throws \Exception
     */
    public static function get($request)
    {
        $type = $request['type'];
        if (in_array($type, MessageEnum::MESSAGE_TYPE)) {
            return self::makeMessage($request, $type);
        }
        return self::makeEvent($request, $type);
    }

    /**
     * @throws \Exception
     */
    private static function makeEvent($data, $type)
    {
        $className = sprintf(self::EVENT_NAME_SPACE . '%s', $type);
        if (class_exists($className)) {
            // 依赖注入
            return self::make($className, $data);
        }
        throw new \Exception('Cant find the event [' . $type . ']!');
    }


    private static function make($name, $data)
    {
        try {
            $res = new $name;
            $reflect = new \ReflectionClass($name);
            $properties = $reflect->getProperties();
            foreach ($properties as $property) {
                $name = $property->getName();
                if (isset($data[$name])) {
                    $res->$name = $data[$name];
                } elseif ($name == 'group') {
                    foreach (['operator', 'member'] as $item) {
                        if (isset($data[$item])) {
                            $res->$name = $data[$item];
                        }
                    }
                }
            }
            return $res;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    private static function makeMessage($data, $type): Message
    {
        return new Message($data);
    }
}
