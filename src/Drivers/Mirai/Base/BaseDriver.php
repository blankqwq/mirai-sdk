<?php

namespace Blankqwq\Mirai\Drivers\Mirai\Base;

use Blankqwq\Mirai\Contract\ApiContract;
use Blankqwq\Mirai\Contract\MiraiApiContract;
use Blankqwq\Mirai\Drivers\Mirai\Base\Traits\AuthApi;
use Blankqwq\Mirai\Drivers\Mirai\Base\Traits\FileApi;
use Blankqwq\Mirai\Drivers\Mirai\Base\Traits\GroupManageAPi;
use Blankqwq\Mirai\Drivers\Mirai\Base\Traits\ManageApi;
use Blankqwq\Mirai\Drivers\Mirai\Base\Traits\MessageApi;
use Blankqwq\Mirai\Exceptions\MiraiException;
use Blankqwq\Mirai\Exceptions\MiraiSendException;
use Blankqwq\Mirai\Message\MessageItem\MessageGroup;
use Blankqwq\Mirai\Mirai;
use Illuminate\Support\Facades\Cache;

abstract class BaseDriver implements ApiContract, MiraiApiContract
{
    use MessageApi;
    use ManageApi;
    use GroupManageAPi;
    use FileApi;
    use AuthApi;

    protected $sessionKey = '';
    protected $client = null;
    protected $host = '';
    protected $qq;
    protected $verify;
    protected $tty;
    /** @var Mirai */
    protected $mirai;

    public const SESSION_KEY_PREFIX = 'mirai_http_';


    public function __construct($mirai, $qq, $host, $verify = '', $tty = 7200)
    {
        $this->mirai = $mirai;
        $this->host = $host;
        $this->qq = $qq;
        $this->tty = $tty;
        $this->verify = $verify;
        $this->sessionKey = $this->getSessionKey();
    }

    public function parseMessage($message)
    {
        if (isset($message['messageChain'])) {
            $messageChain = $message['messageChain'];
            if (is_array($messageChain)) {
                // 其他处理
            } elseif ($messageChain instanceof MessageGroup) {
                $message['messageChain'] = $messageChain->getData();
            }
        }

        return $message;
    }


    protected function putCache($key, $value): bool
    {
        return Cache::put($key, is_array($value) ? json_encode($value) : $value);
    }

    protected function getCache($key)
    {
        $data = Cache::get($key);
        if ($data) {
            return json_decode($data, true);
        }
        return [];
    }

    /**
     * @throws MiraiSendException
     * @throws MiraiException
     */
    protected function checkReturn($data,$info=[]): array
    {
        if (!is_array($data)) {
            throw new MiraiSendException(101, $info);
        }
        if (!isset($data['code'])) {
            throw new MiraiSendException(100, $info);
        }
        if ($data['code'] > 0) {
            throw new MiraiException($data['code']);
        }
        return $data;
    }

    /**
     * @return mixed
     */
    protected function debug()
    {
        return $this->mirai->config('debug', true);
    }

    /**
     * @param $type
     * @param $title
     * @param $data
     * @return void
     */
    protected function log($type, $title, $data = [])
    {
        if ($type === 'info' && !$this->debug()) {
            return;
        }
        \Log::{$type}('mirai-sdk:' . $title, $data);
    }

    public function makeUri($api,$ds){
        return str_replace('|',$ds,$api);
    }


    abstract public function getSessionKey($clear = false);
    abstract public function getClient();
    abstract protected function query($api, $param): array;
    abstract protected function post($api, $param): array;
}