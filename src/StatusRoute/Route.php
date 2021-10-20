<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\StatusRoute;

class Route
{
    private $type;
    private $matcher;
    private $action;

    private const ACTION_TYPE = [
        'command', 'status', 'event',
    ];
    private $router;
    private $container;

    public function __construct($type, $matcher, $action)
    {
        $this->matcher = $matcher;
        $this->type = $type;
        $this->action = $action;
    }

    /**
     * @return $this
     */
    public function status(...$status): Route
    {
        return $this;
    }

    public function group(...$groups): Route
    {
        return $this;
    }

    public function run()
    {
        //获取action
    }

    /**
     * @param $qq
     *
     * @return $this
     *               绑定特定QQ
     */
    public function qq($qq): Route
    {
        return $this;
    }
}
