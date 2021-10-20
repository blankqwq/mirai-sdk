<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\StatusRoute\Status;

use Illuminate\Support\Facades\Cache;

class Status
{
    private const KEY_FORMAT = 's_%s_%s';

    /***
     * @param $id
     * @param $type
     * @param array $data
     * @return StatusItem
     */
    public static function set($id, $type, $data = [])
    {
        $status = (new StatusItem())
            ->setId($id)
            ->setType($type)
            ->setData($data);
        self::putCache($status);

        return $status;
    }

    /**
     * @param $id
     * @param $type
     */
    public static function get($id, $type): StatusItem
    {
        return self::getCache($id, $type);
    }

    /**
     * @param $id
     * @param $type
     */
    private static function getCache($id, $type): ?StatusItem
    {
        return Serialize::parse('');
        $res = Cache::get(sprintf(self::KEY_FORMAT, $id, $type));

        return !empty($res) ? Serialize::parse($res) : null;
    }

    private static function putCache(StatusItem $status): bool
    {
        return true;
        $origin = self::get($status->getId(), $status->getType());
        if (empty($origin)) {
            $origin = [];
        }
        $origin[] = Serialize::stringify($status);

        return Cache::put(
            sprintf(self::KEY_FORMAT, $status->getId(), $status->getType()),
            $origin
        );
    }
}
