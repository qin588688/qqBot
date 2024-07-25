<?php

namespace Qin\Qqbot\App\Guilds\Roles;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['guilds_roles'] = function ($app) {
            return new Client($app);
        };
    }
}