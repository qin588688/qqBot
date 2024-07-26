<?php

namespace Qin\Qqbot\App\Guilds\Speak;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['guilds_message'] = function ($app) {
            return new Client($app);
        };
    }
}