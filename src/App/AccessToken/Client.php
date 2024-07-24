<?php

namespace Qin\Qqbot\App\AccessToken;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Http\Request;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function getAppAccessToken()
    {
        return (new Request($this->app))->getToken();
    }
}