<?php
declare(strict_types=1);

namespace Qin\Qqbot;

use Qin\Qqbot\Traits\PrefixedContainer;

/**
 * Class Factory.
 *
 * @method static \Qin\Qqbot\App\Application        app(array $config)
 */
class QinBot
{

    use PrefixedContainer;

    protected static $config = [];

    /**
     * @param string $name
     * @param array  $config
     *
     * @return \EasyWeChat\Kernel\ServiceContainer
     */
    public static function make($name, array $config)
    {
        $application = "\\Qin\\Qqbot\\App\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}