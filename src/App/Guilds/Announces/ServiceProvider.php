<?php

namespace Qin\Qqbot\App\Guilds\Announces;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['guilds_announces'] = function ($app) {
            return new Client($app);
        };
    }
}