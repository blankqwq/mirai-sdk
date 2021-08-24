<?php

class ApiTest extends \PHPUnit\Framework\TestCase
{

    public function testMirai(){
        $mirai = new Blankqwq\Mirai\Mirai();
        var_dump($mirai->session()->getFriendList());
    }

}