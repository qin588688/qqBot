<?php

namespace Qin\Qqbot\App\Message;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Http\Request;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function toUser($openid,$data)
    {
        return $this->httpPost(vsprintf(Url::Message_To_Users,[$openid]),$data);
    }
}