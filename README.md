### Laravel mirai sdk

[![StyleCI](https://github.styleci.io/repos/399045334/shield?branch=main)](https://github.styleci.io/repos/399045334?branch=main)

> 用于在laravel 开发miria 机器人后端

开发中

- [ ] 状态事件路由
- [ ] Mirai-http 接口对接
- [ ] Mirai 消息类型
- [ ] Mirai-http-adaptor
    - http
    - websocket


> 快速开始

mirai.php
```php
[
    'default' => 'http',
    'host' => 'localhost:8080',
    'verify' => '',
    'tty' => 7200,
    'account' => [
        'qq',
    ],
    'drivers' => [
        'http' => Api::class,
    ],
]

```

```php
Mirai::session()->sendNudge($sender['id'], $group['id']);
```

> 非 Laravel 使用
```php


```