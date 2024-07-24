<?php

namespace Qin\Qqbot\App\Bot;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Http\Request;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function botInfo()
    {
        return (new Request($this->app))->sendGet(Url::Guilds_Bot_Info);
    }
}