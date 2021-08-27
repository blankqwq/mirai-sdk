# Laravel mirai sdk

[![StyleCI](https://github.styleci.io/repos/399045334/shield?branch=main)](https://github.styleci.io/repos/399045334?branch=main)

> 用于在`laravel`开发[`mirai`](https://github.com/mamoe/mirai) 机器人后端

开发中


- [x] Mirai 消息类型
- [x] Mirai 事件类型
- [ ] Mirai-http-adaptor
    - [x] http
    - [ ] websocket
- [ ] 状态事件路由
    - [ ] 单独一个插件


> 快速开始

config/mirai.php

```php
[
    'default' => 'http', // 使用的驱动
    'host' => 'localhost:8080', // adaptor地址
    'verify' => '', // 校验码
    'tty' => 7200, // session过期时间
    'account' => [
        'qq号', // qq号，可以为多个
    ],
    'drivers' => [
        'http' => Http::class, // 驱动列表
    ],
]
```


使用默认qq进行拍一拍
```php
use Blankqwq\Mirai\Mirai;
..

Mirai::session()->sendNudge($sender['id'], $group['id']);

..
```
指定某qq进行拍一拍
```php
use Blankqwq\Mirai\Mirai;

..

$qq='1234567890';
Mirai::session($qq)->sendNudge($sender['id'], $group['id']);

..

```

若为拍一拍目标为机器人时，机器人也进行拍一拍

```php
$eventOrMessage = \Blankqwq\Mirai\Translate::get($request);
if ($event instanceof NudgeEvent) {
    Log::info('success_event', [$currentQQ,$event]);
   if ($event->target==$currentQQ){
        Mirai::session()->sendNudge($event->fromId,$event->subject['id'],$event->subject['kind']);
   }
}

```

### 鸣谢

[`mirai`](https://github.com/mamoe/mirai) <br>
[`project-mirai/mirai-api-http`](https://github.com/project-mirai/mirai-api-http)<br>
[`MiraiGo`](https://github.com/Mrs4s/MiraiGo)<br>
[`Mrs4s/go-cqhttp`](https://github.com/Mrs4s/go-cqhttp)<br>
