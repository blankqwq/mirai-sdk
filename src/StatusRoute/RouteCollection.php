<?php

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