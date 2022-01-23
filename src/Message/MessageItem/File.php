<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Message\MessageItem;

class File extends Base
{
    public function __construct($imageId = '')
    {
        if (!empty($imageId)) {
            $this->data['imageId'] = $imageId;
        }
        parent::__construct();
    }

    public function setUrl($url)
    {
        $this->data['url'] = $url;

        return $this;
    }

    public function setPath($path)
    {
        $this->data['path'] = $path;

        return $this;
    }

    public function setBase64($value)
    {
        $this->data['base64'] = $value;

        return $this;
    }
}
