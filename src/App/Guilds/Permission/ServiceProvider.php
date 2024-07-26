<?php

namespace Qin\Qqbot\App\Guilds\Permission;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['guilds_bot_permission'] = function ($app) {
            return new Client($app);
        };
    }
}