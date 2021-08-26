<?php

namespace Blankqwq\Mirai\Contract;

use Blankqwq\Mirai\Contract\Api\FileApiContract;
use Blankqwq\Mirai\Contract\Api\GroupApiContract;
use Blankqwq\Mirai\Contract\Api\ManageApiContract;
use Blankqwq\Mirai\Contract\Api\MessageApiContract;

interface ApiContract extends GroupApiContract, ManageApiContract, FileApiContract, MessageApiContract
{

}