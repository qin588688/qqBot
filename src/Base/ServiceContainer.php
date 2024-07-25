<?php

namespace Qin\Qqbot\Base;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Qin\Qqbot\Traits\WithAggregator;
use Qin\Qqbot\Uri\Url;

class ServiceContainer extends Container
{

    protected $config;

    protected $envStatus = true;

    protected $providers = [];

    public function __construct(array $config = [], array $prepends = [])
    {
        $this->envStatus = isset($config['envStatus']) && $config['envStatus'] ? true : false;
        $this->config = $config;
        
        parent::__construct($prepends);

        $this->registerProviders($this->getProviders());
        
        $this->getConfig();
    }


    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }

    public function getConfig()
    {
        $base = [
            'http' => [
                'timeout' => 30.0,
                'base_uri' => $this->envStatus ? Url::QQ_Com : Url::QQ_Com_Sandbox,
            ],
        ];
        return array_replace_recursive($base, $this->defaultConfig, $this->config);
    }

    public function getProviders()
    {
        return $this->providers;
    }

    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }
}