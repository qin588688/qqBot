<?php

namespace Qin\Qqbot\App;

use Qin\Qqbot\Base\ServiceContainer;
use Qin\Qqbot\Traits\PrefixedContainer;
use Qin\Qqbot\Uri\Url;

/**
 * Class Application.
 *
 * @property \Qin\Qqbot\App\Guilds\Client $guilds
 * @property \Qin\Qqbot\App\Guilds\Member\Client $guilds_member
 * @property \Qin\Qqbot\App\Guilds\Roles\Client $guilds_roles
 * @property \Qin\Qqbot\App\AccessToken\Client $access_token
 * @property \Qin\Qqbot\App\Bot\Client $bot
 * @property \Qin\Qqbot\App\Message\Client $message
 * @property \Qin\Qqbot\App\Guilds\Permission\Client $guilds_bot_permission
 * @property \Qin\Qqbot\App\Guilds\Speak\Client $guilds_message
 *
 */
class Application extends ServiceContainer
{

    protected $defaultConfig = [];

    protected $providers = [
        \Qin\Qqbot\App\Guilds\ServiceProvider::class,
        \Qin\Qqbot\App\AccessToken\ServiceProvider::class,
        \Qin\Qqbot\App\Bot\ServiceProvider::class,
        \Qin\Qqbot\App\Message\ServiceProvider::class,
        \Qin\Qqbot\App\Guilds\Member\ServiceProvider::class,
        \Qin\Qqbot\App\Guilds\Roles\ServiceProvider::class,
        \Qin\Qqbot\App\Guilds\Permission\ServiceProvider::class,
        \Qin\Qqbot\App\Guilds\Speak\ServiceProvider::class,
    ];

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this['base'], $name], $arguments);
    }
}