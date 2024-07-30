<?php

namespace Qin\Qqbot\App\Guilds\Schedules;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['guilds_schedules'] = function ($app) {
            return new Client($app);
        };
    }
}