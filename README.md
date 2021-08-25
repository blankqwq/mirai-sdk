### Laravel mirai sdk

[![StyleCI](https://github.styleci.io/repos/399045334/shield?branch=main)](https://github.styleci.io/repos/399045334?branch=main)

> 用于在laravel 开发miria 机器人后端

开发中

- [ ] 状态事件路由
- [ ] Mirai-http 接口对接
- [ ] Mirai 消息类型
- [ ] Mirai-http-adaptor
    - [ ] http
    - [ ] websocket


> 快速开始

config/mirai.php

```php
[
    'default' => 'http', // 使用的驱动
    'host' => 'localhost:8080', // adaptor地址
    'verify' => '', // 校验码
    'tty' => 7200, // session过期事件
    'account' => [
        'qq号', // qq号，可以为多个
    ],
    'drivers' => [
        'http' => Api::class, // 驱动列表
    ],
]

```
当仅有一个qq时
```php
Mirai::session()->sendNudge($sender['id'], $group['id']);
```
多个qq时
```php
use Blankqwq\Mirai\Mirai;
Mirai::session()->sendNudge($sender['id'], $group['id']);
```

### 鸣谢

[`mirai`](https://github.com/mamoe/mirai)
[project-mirai/mirai-api-http](https://github.com/project-mirai/mirai-api-http)

<!-- > 非 Laravel 使用 -->
<!-- ```php -->
<!-- ``` -->