<?php

namespace Blankqwq\Mirai\Drivers\Mirai\Base\Traits;

use Blankqwq\Exceptions\MiraiHttpException;
use Blankqwq\Mirai\Enums\ApiEnum;
use Blankqwq\Mirai\Exceptions\MiraiException;

trait AuthApi
{

    /**
     * @param $verify
     *
     * @return array
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
     * @return array
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
     * @return array
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

}