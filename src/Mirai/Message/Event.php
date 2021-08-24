<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Message;

class Event
{
    private $eventId;
    private $fromId;
    private $message;
    private $type;

    private $operator = [];
    private $target = [];
    private $group = [];

    private $origin = [];

    public function __construct($data)
    {
        $this->origin = $data;
        $this->parse($data);
    }

    /**
     * @param $data
     */
    private function parse($data)
    {

    }


    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param mixed $eventId
     */
    public function setEventId($eventId): void
    {
        $this->eventId = $eventId;
    }

    /**
     * @return mixed
     */
    public function getFromId()
    {
        return $this->fromId;
    }

    /**
     * @param mixed $fromId
     */
    public function setFromId($fromId): void
    {
        $this->fromId = $fromId;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getOperator(): array
    {
        return $this->operator;
    }

    /**
     * @param array $operator
     */
    public function setOperator(array $operator): void
    {
        $this->operator = $operator;
    }

    /**
     * @return array
     */
    public function getTarget(): array
    {
        return $this->target;
    }

    /**
     * @param array $target
     */
    public function setTarget(array $target): void
    {
        $this->target = $target;
    }

    /**
     * @return array
     */
    public function getGroup(): array
    {
        return $this->group;
    }

    /**
     * @param array $group
     */
    public function setGroup(array $group): void
    {
        $this->group = $group;
    }

    /**
     * @return array
     */
    public function getOrigin(): array
    {
        return $this->origin;
    }

    /**
     * @param array $origin
     */
    public function setOrigin(array $origin): void
    {
        $this->origin = $origin;
    }

}
