<?php

namespace Qin\Qqbot\App\AccessToken;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['access_token'] = function ($app) {
            return new Client($app);
        };
    }
}