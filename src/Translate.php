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
use Illuminate\Support\Arr;

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
     * @param $request
     * @return Message|null
     */
    public static function getMessage($request): ?Message
    {
        $type = $request['type'];
        if (in_array($type, MessageEnum::MESSAGE_TYPE)) {
            return self::makeMessage($request, $type);
        }
        return null;
    }


    /**
     * @throws \Exception
     */
    public static function getEvent($request)
    {
        $type = $request['type'];
        if (!in_array($type, MessageEnum::MESSAGE_TYPE)) {
            return self::makeEvent($request, $type);
        }
        return null;
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
            $res = new $name();
            $reflect = new \ReflectionClass($name);
            $properties = $reflect->getProperties();
            foreach ($properties as $property) {
                $name = $property->getName();
                if (isset($data[$name])) {
                    $res->$name = $data[$name];
                } elseif ('group' == $name) {
                    foreach (['operator', 'member'] as $item) {
                        if (isset($data[$item]['group'])) {
                            $res->$name = $data[$item]['group'];
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
        return new Message($type, $data);
    }

    // 匹配到某事件时
    public static function match($request, $type, \Closure $closure)
    {
        $res = self::get($request);
        if ($res instanceof $type) {
            return $closure($res);
        }
        return null;
    }

    public static function matches(){

    }

}
