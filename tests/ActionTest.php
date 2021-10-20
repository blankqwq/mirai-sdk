<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Blankqwq\Mirai\StatusRoute\Route;
use Blankqwq\Mirai\StatusRoute\Router;

class ActionTest extends \PHPUnit\Framework\TestCase
{

    public function testStatusRoute()
    {
        $statusRouter = new Router();
        $statusRouter->command('签到', function ($message) {
            var_dump($message);
        })->qq(1136589922);
        $statusRouter->command('签到', function ($message) {
                var_dump($message, ['test']);
            })->qq(1136589911);
        $statusRouter->match([
            'type' => 'GroupMessage',
            'messageChain' => [
                [
                    'id' => 1
                ],
                [
                    'type' => 'Plain',
                    'text' => '签到'
                ]
            ]
        ], 1136589922);
        $statusRouter->match([
            'type' => 'GroupMessage',
            'messageChain' => [
                [
                    'id' => 1
                ],
                [
                    'type' => 'Plain',
                    'text' => '签到'
                ]
            ]
        ], 1136589911);
    }
}
