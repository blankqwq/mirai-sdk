<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Http;

use Blankqwq\Exceptions\MiraiHttpException;
use Blankqwq\Mirai\Contract\ApiContract;
use Blankqwq\Mirai\Exceptions\MiraiException;
use Blankqwq\Mirai\Http\Traits\FileApi;
use Blankqwq\Mirai\Http\Traits\GroupManageAPi;
use Blankqwq\Mirai\Http\Traits\ManageApi;
use Blankqwq\Mirai\Http\Traits\MessageApi;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class Api implements ApiContract
{
    use MessageApi;
    use ManageApi;
    use GroupManageAPi;
    use FileApi;

    public const SESSION_KEY_PREFIX = 'mirai_http_';

    private $sessionKey = '';
    private $client = null;
    private $host = '';
    private $qq;
    private $verify;
    private $tty;

    public function __construct($qq, $host, $verify = '', $tty = 7200)
    {
        $this->host = $host;
        $this->client = new Client();
        $this->qq = $qq;
        $this->tty = $tty;
        $this->verify = $verify;
        $this->sessionKey = $this->getSessionKey();
    }

    public function getSessionKey($clear = false)
    {
        $key = self::SESSION_KEY_PREFIX.''.$this->qq;
        if (!$clear) {
            $data = Cache::get($key);
            if ($data) {
                $data = json_decode($data, true);
                $sessionKey = $data['key'];
                if (time() >= $data['tty']) {
                    $this->sessionKey = null;
                    $this->release($this->qq, $sessionKey);
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
        Cache::put($key, json_encode($data));

        return $sessionKey;
    }

    public function verify($verify)
    {
        $param = [
            'verifyKey' => $verify,
        ];

        return $this->post(ApiEnum::VERIFY, $param);
    }

    public function bind($qq, $sessionKey)
    {
        $param = [
            'qq' => $qq,
            'sessionKey' => $sessionKey,
        ];

        return $this->post(ApiEnum::BIND, $param);
    }

    public function release($qq, $sessionKey)
    {
        $param = [
            'qq' => $qq,
            'sessionKey' => $sessionKey,
        ];

        return $this->post(ApiEnum::RELEASE, $param);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws MiraiHttpException
     */
    public function countMessage(): array
    {
        return $this->query(ApiEnum::COUNT_MESSAGE, []);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws MiraiHttpException
     */
    public function about(): array
    {
        return $this->query(ApiEnum::ABOUT, []);
    }

    /**
     * @param $api
     *
     * @throws MiraiHttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws MiraiException
     */
    private function query($api, array $param = []): array
    {
        return $this->request('GET', $api, $param);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws MiraiHttpException
     * @throws MiraiException
     */
    private function post($api, array $param = []): array
    {
        return $this->request('POST', $api, $param);
    }

    private function request($method, $api, $param)
    {
        while (true) {
            if (!empty($this->sessionKey)) {
                $param['sessionKey'] = $this->sessionKey; //追加access_token到参数表
            }
            if ('GET' === $method) {
                $body = ['query' => $param];
            } else {
                $body = ['json' => $param];
            }
            $result = $this->client->request($method, $this->host.$api, $body);
            \Log::info('request_data', [$this->host.$api, $method, $param, $result]);
            $res = json_decode($result->getBody()->getContents(), true);
            if (3 === $res['code']) {
                $this->sessionKey = $this->getSessionKey(true);
                \Log::info('reGetSession', [$this->sessionKey]);
            } else {
                return $this->checkReturn($res);
            }
        }
    }

    /**
     * @throws MiraiHttpException
     * @throws MiraiException
     */
    private function checkReturn($data): array
    {
        if (!is_array($data)) {
            throw new MiraiHttpException(1, $data);
        }
        if (!isset($data['code'])) {
            throw new MiraiHttpException(1, $data);
        }
        if ($data['code'] > 0) {
            throw new MiraiException($data['code']);
        }

        return $data;
    }
}
