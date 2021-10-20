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

/**
 * 管道方式执行.
 */
class Pipeline
{
    private $middlewares = [];

    public function run($actions, $miraiRequest)
    {
        return $this->handler($actions, $miraiRequest);
    }

    public function setMiddleware($middles): Pipeline
    {
        $this->middlewares = array_merge(
            $this->middlewares,
            $middles
        );

        return $this;
    }

    private function handler($actions, $miraiRequest)
    {
        $pipeLine = array_reduce(
            array_reverse($this->middlewares),
            $this->carry(),
            $this->prepareRun($actions)
        );

        return $pipeLine($miraiRequest);
    }

    private function carry(): \Closure
    {
        return function ($closure, $middleware) {
            return function () use ($middleware, $closure) {
                return $middleware($closure);
            };
        };
    }

    private function prepareRun($action): \Closure
    {
        return function ($passable) use ($action) {
            return $action($passable);
        };
    }
}
