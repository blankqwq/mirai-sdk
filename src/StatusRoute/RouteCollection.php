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

class RouteCollection
{
    protected $routes = [];
    private $allRoutes = [];

    public function add(Route $route): Route
    {
        $this->addToCollection($route);

        return $route;
    }

    public function addToCollection(Route $route)
    {
    }
}
