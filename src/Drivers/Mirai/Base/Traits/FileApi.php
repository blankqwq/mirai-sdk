<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Drivers\Mirai\Base\Traits;

use Blankqwq\Mirai\Enums\ApiEnum;

trait FileApi
{
    /**
     * @param $type
     * @param $image
     * @return array
     */
    public function uploadImage($type, $image): array
    {
        $param = [
            'type' => $type,
            'img' => $image,
        ];

        return $this->post(ApiEnum::UPLOAD_IMAGE, $param);
    }

    /**
     * @param $type
     * @param $voice
     * @return array
     * 上传语音
     */
    public function uploadVoice($type, $voice): array
    {
        $param = [
            'type' => $type,
            'voice' => $voice,
        ];

        return $this->post(ApiEnum::UPLOAD_VOICE, $param);
    }

    public function upload($type, $path, $file): array
    {
        $param = [
            'type' => $type,
            'path' => $path,
            'file' => $file,
        ];

        return $this->post(ApiEnum::UPLOAD_FILE, $param);
    }

    public function unlink($id, $target, $type)
    {
        $param = [
                'id' => $id,
            ] + $this->makeTargetParam($target, $type);

        return $this->post(ApiEnum::DELETE_FILE, $param);
    }

    public function rename($id, $target, $type, $renameTo)
    {
        $param = [
                'id' => $id,
                'renameTo' => $renameTo,
            ] + $this->makeTargetParam($target, $type);

        return $this->post(ApiEnum::RENAME_FILE, $param);
    }

    public function move($id, $target, $type, $moveTo)
    {
        $param = [
                'id' => $id,
                'moveTo' => $moveTo,
            ] + $this->makeTargetParam($target, $type);

        return $this->post(ApiEnum::MOVE_FILE, $param);
    }

    public function mkdir($id, $target, $type, $directoryName)
    {
        $param = [
                'id' => $id,
                'directoryName' => $directoryName,
            ] + $this->makeTargetParam($target, $type);

        return $this->post(ApiEnum::MAKE_DIR, $param);
    }

    /**
     * @param $target
     * @param $type
     * {
     *                                                   "name":"setu.png",
     *                                                   "id":"/12314d-1wf13-a98ffa",
     *                                                   "path":"/setu.png",
     *                                                   "parent":null,
     *                                                   "contact":{
     *                                                   "id":123123,
     *                                                   "name":"setu qun",
     *                                                   "permission":"OWNER"
     *                                                   },
     *                                                   "isFile":true,
     *                                                   "isDictionary":false,
     *                                                   "isDirectory":false,
     *                                                   "downloadInfo":{
     *                                                   "sha1":"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
     *                                                   "md5":"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
     *                                                   "url":"xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
     *                                                   }
     *                                                   }
     */
    public function list($target, $type, int $offset = 0, int $size = 15, bool $withDownloadInfo = true): array
    {
        $param = [
                'withDownloadInfo' => $withDownloadInfo,
                'offset' => $offset,
                'size' => $size,
            ] + $this->makeTargetParam($target, $type);

        return $this->query(ApiEnum::GET_FILE_LIST, $param);
    }

    /**
     * @param $id
     * @param $target
     * @param $type
     * @param $withDownloadInfo
     * @return mixed
     */
    public function info($id, $target, $type, $withDownloadInfo = true)
    {
        $param = [
                'id' => $id,
                'withDownloadInfo' => $withDownloadInfo,
            ] + $this->makeTargetParam($target, $type);

        return $this->query(ApiEnum::GET_FILE_INFO, $param);
    }

    /**
     * @param $target
     * @param $type
     * @return array
     */
    private function makeTargetParam($target, $type = 'group'): array
    {
        return [
            $type => $target,
        ];
    }
}
