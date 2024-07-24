<?php

namespace Qin\Qqbot\App\Guilds;

use Qin\Qqbot\Uri\Url;

class Client
{

    public function getUrl()
    {
        return Url::Gateway;
    }
}