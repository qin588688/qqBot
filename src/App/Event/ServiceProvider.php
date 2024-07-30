<?php

namespace Qin\Qqbot\App\Event;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['event'] = function ($app) {
            return new Client($app);
        };
    }
}