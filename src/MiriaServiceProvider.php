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

use Blankqwq\Mirai\StatusRoute\Router;

class MiriaServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Mirai::class, function () {
            return new Mirai(config('mirai'));
        });
        $this->app->singleton(Router::class, function () {
            return new Router();
        });
        $this->app->alias(Mirai::class, 'mirai');
        $this->app->alias(Router::class, 'mirai.router');
    }

    public function provides()
    {
        return [Mirai::class, 'mirai'];
    }
}
