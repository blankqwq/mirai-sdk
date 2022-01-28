<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Drivers\Mirai;

use Blankqwq\Exceptions\MiraiHttpException;
use Blankqwq\Mirai\Drivers\Mirai\Base\BaseDriver;
use Blankqwq\Mirai\Enums\MiraiErrorCode;
use Blankqwq\Mirai\Exceptions\MiraiException;
use Blankqwq\Mirai\Exceptions\MiraiSendException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Http extends BaseDriver
{

    /**
     * @param false $clear
     *
     * @return mixed
     */
    public function getSessionKey($clear = false)
    {
        if (empty($this->verify)) {
            // 表示关闭了session
            return null;
        }
        $key = self::SESSION_KEY_PREFIX . '_' . $this->qq;
        if (!$clear) {
            $data = $this->getCache($key);
            if ($data) {
                $sessionKey = $data['key'];
                if (time() >= $data['tty']) {
                    $this->sessionKey = null;
                    try {
                        $this->release($this->qq, $sessionKey);
                    } catch (\Exception $exception) {
                        $this->log('error','clear-session-key',$exception->getMessage());
                    }
                } else {
                    return $sessionKey;
                }
            }
        } else {
            $this->sessionKey = null;
        }
        $sessionKey = $this->verify($this->verify);
        $sessionKey = $sessionKey['session'];
        $this->bind($this->qq, $sessionKey);
        $data = [
            'key' => $sessionKey,
            'tty' => time() + $this->tty,
        ];
        $this->putCache($key,$data);
        return $sessionKey;
    }


    /**
     * @param $api
     * @param $param
     * @return array
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    protected function query($api, $param = []): array
    {
        return $this->send('GET', $api, $param);
    }

    /**
     * @param $api
     * @param $param
     * @return array
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    protected function post($api, $param = []): array
    {
        return $this->send('POST', $api, $param);
    }

    /**
     * @return Client|null
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = new Client($this->mirai->config('guzzleConfig', []));
        }
        return $this->client;
    }

    /**
     * @param $method
     * @param $api
     * @param $param
     *
     * @return array
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiSendException
     */
    private function send($method, $api, $param): array
    {
        while (true) {
            if (!empty($this->sessionKey)) {
                $param['sessionKey'] = $this->sessionKey; //追加access_token到参数表
            }
            $param = $this->parseMessage($param);
            if ('GET' === $method) {
                $body = ['query' => $param];
            } else {
                $body = ['json' => $param];
            }
            $api = $this->makeUri($api,'/');
            $url = $this->host . '/' . $api;
            $result = $this->getClient()->request($method, $url, $body);
            // info 记录
            $info = [
                'url' => $url,
                'method' => $method,
                'body' => $param,
            ];
            $this->log('info', 'send-data', $info);
            $res = json_decode($result->getBody()->getContents(), true);
            $info['result'] = $res;
            // session 过期
            if (MiraiErrorCode::SESSION_EXPIRE_ERR === $res['code']) {
                $this->sessionKey = $this->getSessionKey(true);
                $this->log('info', 'update-session-key', [$this->sessionKey]);
            } else {
                return $this->checkReturn($res,$info);
            }
        }
    }


}
