<?php

namespace Blankqwq\Message\MessageType;

class File extends Base
{
    public function __construct($imageId = "")
    {
        if (!empty($imageId)) {
            $this->data['imageId'] = $imageId;
        }
        parent::__construct();
    }

    public function setUrl($url)
    {
        $this->data['url'] = $url;
    }

    public function setPath($path)
    {
        $this->data['path'] = $path;

    }

    public function setBase64($value)
    {
        $this->data['base64'] = $value;

    }
}