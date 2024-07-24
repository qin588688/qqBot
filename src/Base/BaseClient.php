<?php

namespace Qin\Qqbot\Base;

use Qin\Qqbot\App\Application;

class BaseClient
{

    protected $app;

    /**
     * Constructor.
     *
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}