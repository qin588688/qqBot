<?php

namespace Qin\Qqbot\App\Bot;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['bot'] = function ($app) {
            return new Client($app);
        };
    }
}