<?php

namespace Qin\Qqbot\App\Guilds\Pins;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['guilds_pins'] = function ($app) {
            return new Client($app);
        };
    }
}