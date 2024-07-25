<?php

namespace Qin\Qqbot\App\Guilds\Member;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {
        $app['guilds_member'] = function ($app) {
            return new Client($app);
        };
    }
}