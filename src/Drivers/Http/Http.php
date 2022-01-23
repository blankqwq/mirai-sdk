<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Drivers\Http;

use Blankqwq\Exceptions\MiraiHttpException;
use Blankqwq\Mirai\Contract\MiraiApiContract;
use Blankqwq\Mirai\Drivers\Http\Traits\FileApi;
use Blankqwq\Mirai\Drivers\Http\Traits\GroupManageAPi;
use Blankqwq\Mirai\Drivers\Http\Traits\ManageApi;
use Blankqwq\Mirai\Drivers\Http\Traits\MessageApi;
use Blankqwq\Mirai\Enums\MiraiErrorCode;
use Blankqwq\Mirai\Exceptions\MiraiException;
use Blankqwq\Mirai\Message\MessageItem\MessageGroup;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Http implements MiraiApiContract
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

    /**
     * @throws GuzzleException
     * @throws MiraiHttpException
     * @throws MiraiException
     */
    public function __construct($qq, $host, $verify = '', $tty = 7200)
    {
        $this->host = $host;
        $this->client = new Client();
        $this->qq = $qq;
        $this->tty = $tty;
        $this->verify = $verify;
        $this->sessionKey = $this->getSessionKey();
    }

    public function parseMessage($data)
    {
        if (isset($data['messageChain'])) {
            $messageChain = $data['messageChain'];
            if (is_array($messageChain)) {
                // 其他处理
            } elseif ($messageChain instanceof MessageGroup) {
                $data['messageChain'] = $messageChain->getData();
            }
        }

        return $data;
    }

    /**
     * @param false $clear
     *
     * @return mixed
     *
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    public function getSessionKey($clear = false)
    {
        if (empty($this->verify)) {
            // 表示关闭了session
            return null;
        }
        $key = self::SESSION_KEY_PREFIX.''.$this->qq;
        if (!$clear) {
            $data = Cache::get($key);
            if ($data) {
                $data = json_decode($data, true);
                $sessionKey = $data['key'];
                if (time() >= $data['tty']) {
                    $this->sessionKey = null;
                    try {
                        $this->release($this->qq, $sessionKey);
                    } catch (\Exception $exception) {
                        Log::info('clear-error');
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
        Cache::put($key, json_encode($data));

        return $sessionKey;
    }

    /**
     * @param $verify
     *
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    public function verify($verify): array
    {
        $param = [
            'verifyKey' => $verify,
        ];

        return $this->post(ApiEnum::VERIFY, $param);
    }

    /**
     * @param $qq
     * @param $sessionKey
     *
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    public function bind($qq, $sessionKey): array
    {
        $param = [
            'qq' => $qq,
            'sessionKey' => $sessionKey,
        ];

        return $this->post(ApiEnum::BIND, $param);
    }

    /**
     * @param $qq
     * @param $sessionKey
     *
     * @return array
     *
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    public function release($qq, $sessionKey)
    {
        $param = [
            'qq' => $qq,
            'sessionKey' => $sessionKey,
        ];

        return $this->post(ApiEnum::RELEASE, $param);
    }

    /**
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    public function countMessage(): array
    {
        return $this->query(ApiEnum::COUNT_MESSAGE, []);
    }

    /**
     * @throws GuzzleException
     * @throws MiraiHttpException|MiraiException
     */
    public function about(): array
    {
        return $this->query(ApiEnum::ABOUT, []);
    }

    /**
     * @param $api
     *
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    private function query($api, array $param = []): array
    {
        return $this->request('GET', $api, $param);
    }

    /**
     * @param $api
     *
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    private function post($api, array $param = []): array
    {
        return $this->request('POST', $api, $param);
    }

    /**
     * @param $method
     * @param $api
     * @param $param
     *
     * @throws GuzzleException
     * @throws MiraiException
     * @throws MiraiHttpException
     */
    private function request($method, $api, $param): array
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
            $result = $this->client->request($method, $this->host.$api, $body);
            \Log::info('request_data'.Str::limit(json_encode($param), 500), [$this->host.$api, $method, $result]);
            $res = json_decode($result->getBody()->getContents(), true);
            if (MiraiErrorCode::SESSION_EXPIRE_ERR === $res['code']) {
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
            throw new MiraiHttpException(100, $data);
        }
        if (!isset($data['code'])) {
            throw new MiraiHttpException(100, $data);
        }
        if ($data['code'] > 0) {
            throw new MiraiException($data['code']);
        }

        return $data;
    }
}
