<?php

namespace Blankqwq\Mirai\StatusRoute;

use Blankqwq\Mirai\StatusRoute\Status\StatusItem;

class Route
{
    private $type;
    private $matcher;
    private $action;

    private const ACTION_TYPE = [
        'command','status','event'
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

    /**
     *
     */
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
     * @return $this
     * 绑定特定QQ
     */
    public function qq($qq): Route
    {
        return $this;
    }

}