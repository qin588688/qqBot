<?php

namespace Qin\Qqbot\App;

use Qin\Qqbot\Base\ServiceContainer;
use Qin\Qqbot\Traits\PrefixedContainer;
use Qin\Qqbot\Uri\Url;

/**
 * Class Application.
 *
 * @property \Qin\Qqbot\App\Guilds\Client $guilds
 * @property \Qin\Qqbot\App\AccessToken\Client $access_token
 * @property \Qin\Qqbot\App\Bot\Client $bot
 *
 */
class Application extends ServiceContainer
{

    protected $defaultConfig = [];

    protected $providers = [
        \Qin\Qqbot\App\Guilds\ServiceProvider::class,
        \Qin\Qqbot\App\AccessToken\ServiceProvider::class,
        \Qin\Qqbot\App\Bot\ServiceProvider::class
    ];

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this['base'], $name], $arguments);
    }
}