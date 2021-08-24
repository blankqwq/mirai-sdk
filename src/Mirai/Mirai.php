<?php

namespace Blankqwq\Mirai;


use Blankqwq\Mirai\Http\Api;


class Mirai
{
    private $config = [
        'default' => 'http',
        'host' => 'localhost:8080',
        'verify' => '',
        'tty' => 7200,
        'account' => [
            '1136589922',
        ],
        'drivers' => [
            'http' => Api::class,
        ]
    ];

    private $driver = null;
    private $default = "http";

    public function __construct($config = [])
    {
        $this->config = array_merge($this->config, $config);
    }


    public function session($qq = null)
    {
        if (is_null($qq)) {
            $qq = $this->config['account'][0];
        }
        if (isset($this->driver[$qq])) {
            return $this->driver[$qq];
        }
        if (isset($this->config['drivers'][$qq])) {
            return $this->driver[$qq] = $this->make($this->config['drivers'][$this->default], $qq);
        }
        return $this->driver[$qq] = $this->default($qq);
    }

    private function make($name, $qq)
    {
        return new $name($qq, trim($this->config['host'], '/'), $this->config['verify'], $this->config['tty']);
    }


    /**
     * @param $qq
     * @return Api
     */
    private function default($qq): Api
    {
        return $this->make(Api::class, $qq);
    }

}