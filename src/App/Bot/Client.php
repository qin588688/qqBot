<?php

namespace Qin\Qqbot\App\Bot;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Http\Request;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function botInfo()
    {
        return $this->httpGet(Url::Guilds_Bot_Info);
    }

    public function botGuilds()
    {
        return $this->httpGet(Url::Me_Guilds);
    }
}