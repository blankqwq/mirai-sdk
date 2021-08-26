<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai\Contract;

use Blankqwq\Mirai\Contract\Api\FileApiContract;
use Blankqwq\Mirai\Contract\Api\GroupApiContract;
use Blankqwq\Mirai\Contract\Api\ManageApiContract;
use Blankqwq\Mirai\Contract\Api\MessageApiContract;

interface ApiContract extends GroupApiContract, ManageApiContract, FileApiContract, MessageApiContract
{
}
