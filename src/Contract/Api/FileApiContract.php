<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Contract\Api;

interface FileApiContract
{
    public function uploadImage($type, $image): array;

    public function uploadVoice($type, $voice): array;

    public function upload($type, $path, $file): array;

    public function unlink($id, $target, $type);

    public function rename($id, $target, $type, $renameTo);

    public function move($id, $target, $type, $moveTo);

    public function mkdir($id, $target, $type, $directoryName);

    public function list($target, $type, int $offset = 0, int $size = 15, bool $withDownloadInfo = true): array;

    public function info($id, $target, $type, $withDownloadInfo = true);
}
