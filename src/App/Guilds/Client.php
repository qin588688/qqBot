<?php

namespace Qin\Qqbot\App\Guilds;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function list()
    {
        return $this->httpGet(Url::Me_Guilds);
    }

    public function getUrl()
    {
        return Url::Gateway;
    }
}