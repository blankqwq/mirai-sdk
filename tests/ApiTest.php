<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

class ApiTest extends \PHPUnit\Framework\TestCase
{
    public function testMirai()
    {
        $mirai = new Blankqwq\Mirai\Mirai();
        var_dump($mirai->session()->getFriendList());
    }
}
