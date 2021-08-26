<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai;

use Blankqwq\Mirai\Contract\ApiContract;
use Blankqwq\Mirai\Drivers\Http\Http;

class Mirai
{
    private $config = [
        'default' => 'http',
        'host' => 'localhost:8080',
        'verify' => '',
        'tty' => 7200,
        'account' => [
            '',
        ],
        'drivers' => [
            'http' => Http::class,
        ],
    ];

    private $driver = null;
    private $default = null;

    public function __construct($config = [])
    {
        $this->config = array_merge($this->config, $config);
    }

    public function session($qq = null): ApiContract
    {
        if (is_null($qq)) {
            $qq = $this->getDefaultQQ();
        }

        if (isset($this->driver[$qq])) {
            return $this->driver[$qq];
        }

        if (isset($this->config['drivers'][$qq])) {
            return $this->driver[$qq] = $this->make($this->config['drivers'][$this->default], $qq);
        }

        return $this->driver[$qq] = $this->default($qq);
    }

    private function getDefaultQQ()
    {
        return is_array($this->config['account']) ? $this->config['account'][0] : $this->config['account'];
    }

    private function make($name, $qq): ApiContract
    {
        return new $name($qq, trim($this->config['host'], '/'), $this->config['verify'], $this->config['tty']);
    }

    /**
     * @param $qq
     *
     * @return Http
     */
    private function default($qq): ApiContract
    {
        return $this->make(Http::class, $qq);
    }
}
