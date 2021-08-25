<?php

/*
 * This file is part of the blankqwq/mirai-sdk.
 *
 * (c) blankqwq <1136589038@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Blankqwq\Mirai;

class MiriaServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Mirai::class, function () {
            return new Mirai(config('mirai'));
        });

        $this->app->alias(Mirai::class, 'mirai');
    }

    public function provides()
    {
        return [Mirai::class, 'mirai'];
    }
}
