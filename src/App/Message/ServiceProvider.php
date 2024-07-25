<?php

namespace Qin\Qqbot\App\Message;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Qin\Qqbot\App\Message\Client;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['message'] = function ($app) {
            return new Client($app);
        };
    }
}