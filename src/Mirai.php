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
use Blankqwq\Mirai\Exceptions\NotFoundQQException;

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

    /**
     * @throws NotFoundQQException
     */
    public function session($qq = null): ApiContract
    {
        $qq = $this->getQQ($qq);
        if (isset($this->driver[$qq])) {
            return $this->driver[$qq];
        }

        if (isset($this->config['drivers'][$qq])) {
            return $this->driver[$qq] = $this->make($this->config['drivers'][$this->default], $qq);
        }

        return $this->driver[$qq] = $this->default($qq);
    }

    public function all(): array
    {
        $accounts = $this->config['account'];
        $res = [];
        foreach ($accounts as $account) {
            $res[] = $this->session($account);
        }
        return $res;
    }

    /**
     * @throws NotFoundQQException
     */
    private function getQQ($qq)
    {
        if (empty($qq)) {
            return is_array($this->config['account']) ? $this->config['account'][0] : $this->config['account'];
        }
        if (!in_array($qq, $this->config['account'])) {
            throw new NotFoundQQException("can't found this qq 【 $qq 】");
        }
        return $qq;
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
