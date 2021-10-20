<?php

namespace Blankqwq\Mirai\StatusRoute;

use Blankqwq\Mirai\Message\Message;
use Blankqwq\Mirai\StatusRoute\Status\Status;
use Blankqwq\Mirai\Translate;
use Illuminate\Http\Request;

class Router
{
    protected $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();
    }

    public function command($command, $action): Route
    {
        return $this->addRoute('command', $command, $action);
    }

    public function event($eventType, $action): Route
    {
        return $this->addRoute('event', $eventType, $action);
    }

    public function status($status, $action): Route
    {
        return $this->addRoute('status', $status, $action);
    }

    private function addRoute($type, $matcher, $action): Route
    {
        return $this->routes->add($this->createRoute($type, $matcher, $action));
    }

    private function createRoute($type, $matcher, $action): Route
    {
        return new Route($type, $matcher, $action);
    }

    public function match($request, $currentQQ)
    {
        // 根据request进行检索事件/数据
        $miraiRequest = Translate::get($request);
        // 获取当前QQ
        $status = Status::get($currentQQ, $miraiRequest->type);
        // 读取状态路由 先找指定路由
        if ($miraiRequest instanceof Message) {
            $runAction = $this->getCommandActions($miraiRequest, $miraiRequest);
        } else {
            $runAction = $this->getEventActions($miraiRequest, $miraiRequest);
        }
        $statusMiddleware = $this->getStatusActions($miraiRequest, $status);
        //Pipeline执行
        return (new Pipeline())
            ->setMiddleware($statusMiddleware)
            ->run($runAction, $miraiRequest);
    }

    private function getStatusActions($miraiRequest, $action): array
    {
        return [];
    }

    protected function getEventActions($obj, $status): array
    {
        // 路由选择
        return [];
    }

    protected function getCommandActions($obj, $status): array
    {
        // 路由选择
        return [];
    }
}