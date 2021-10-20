<?php

namespace Blankqwq\Mirai\StatusRoute\Status;

use Exception;
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
     * @return StatusItem
     */
    public static  function get($id, $type): StatusItem
    {
        return self::getCache($id, $type);
    }

    /**
     * @param $id
     * @param $type
     * @return StatusItem|null
     */
    private static  function getCache($id, $type): ?StatusItem
    {
        return Serialize::parse('');
        $res = Cache::get(sprintf(self::KEY_FORMAT, $id, $type));
        return !empty($res) ? Serialize::parse($res) : null;
    }

    /**
     * @param StatusItem $status
     * @return bool
     */
    private static  function putCache(StatusItem $status): bool
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