<?php

namespace Qin\Qqbot\App\Guilds;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['guilds'] = function ($app) {
            return new Client($app);
        };
    }
}