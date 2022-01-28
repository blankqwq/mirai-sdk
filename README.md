# Laravel mirai sdk

[![StyleCI](https://github.styleci.io/repos/399045334/shield?branch=main)](https://github.styleci.io/repos/399045334?branch=main)

> 用于在`laravel`开发[`mirai`](https://github.com/mamoe/mirai) 机器人后端

### 开发中

> 目前为测试版,所以更新较为频繁。 

所有功能完成后发布的v1.0.0

大部分完成后发布v0.x.0

- [x] Mirai 消息类型
- [x] Mirai 事件类型
- [x] 良好的IDE提示
- [x] 请求翻译成对应类
- [ ] Mirai-http-adaptor
    - [x] http
    - [ ] websocket
- [x] 状态事件路由
    - [x] 单独一个插件
    - [ ] 完善功能
- [ ] GoCq适配

> ### 快速开始

安装
```
composer require blankqwq/mirai-sdk:dev-master -vvv
```

创建配置文件 `config/mirai.php`

```php
use Blankqwq\Mirai\Drivers\Mirai\Http;
return [
    'default' => 'http', // 使用的驱动
    'debug'=>true,      // 日志记录
    'host' => 'localhost:8080', // adaptor地址
    'verify' => '', // 校验码
    'tty' => 7200, // session过期时间
    'account' => [
        'qq号', // qq号，可以为多个
    ],
    'drivers' => [ // 驱动列表,非必填(不建议设置,除非有自定义需求)
        'http' => Http::class, 
    ],
    'guzzleConfig'=>[

    ]
]
```

> 简单示例

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

发送群组消息

```php
  $mirai->sendGroupMsg($qq,new MessageGroup(new Text(Arr::random(['没有了~','被玩坏了！','再问我要给你一拳','干哈，爷就是没有','？还来']))));
```
发送给好友
```php
$mirai->sendFriendMsg(
        $qq->subject['id'], // 此处为qq
        new MessageGroup(new Text(Arr::random(['没有了~','被玩坏了！','再问我要给你一拳','干哈，爷就是没有','？还来'])))
    );
```
多消息类型
```php
$imageMessage= new \Blankqwq\Mirai\Message\MessageItem\Image();
$imageMessage->setBase64(''));  // base64编码
$imageMessage->setUrl('http://..'); // 图片地址
$at = new \Blankqwq\Mirai\Message\MessageItem\At('qq号');
new MessageGroup($at,new Text(),new Image($imageMessage),...);

```

更多内容请查阅文档

## API

采用小驼峰命名

> 参考[`project-mirai/mirai-api-http`](https://github.com/project-mirai/mirai-api-http)Adaptor文档

事件匹配
```php
Translate::match($request,NudgeEvent::class,function($event){
    // 事件执行的回调

});
```


## 参与贡献


## 鸣谢

[`mirai`](https://github.com/mamoe/mirai) <br>
[`project-mirai/mirai-api-http`](https://github.com/project-mirai/mirai-api-http)<br>
[`MiraiGo`](https://github.com/Mrs4s/MiraiGo)<br>
[`Mrs4s/go-cqhttp`](https://github.com/Mrs4s/go-cqhttp)<br>
