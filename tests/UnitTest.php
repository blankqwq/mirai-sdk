<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Blankqwq\Mirai\Mirai;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class UnitTest extends \PHPUnit\Framework\TestCase
{
//    public function testMirai(){
//    }

    public function testApi()
    {
        // 创建模拟接口响应值。
        $response = new Response(200, [], '{"success": true}');

        // 创建模拟 http client。
        $client = \Mockery::mock(Client::class);

        // 指定将会产生的行为（在后续的测试中将会按下面的参数来调用）。
        $client->allows()->get('localhost:8080', [
            'query' => [
            ],
        ])->andReturn($response);

        // 将 `getHttpClient` 方法替换为上面创建的 http client 为返回值的模拟方法。
        /** @var Mirai $w */
        $w = \Mockery::mock(Mirai::class, [])->makePartial();
        $w->allows()->getHttpClient()->andReturn($client); // $client 为上面创建的模拟实例。
        // 然后调用 `getWeather` 方法，并断言返回值为模拟的返回值。
        $this->assertSame(['success' => true], $w->session()->sendGroupMsg(1, ));
    }

    public function testTranslate()
    {
        $trans = \Blankqwq\Mirai\Translate::get([]);
    }
}
