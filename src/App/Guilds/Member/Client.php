<?php

namespace Qin\Qqbot\App\Guilds\Member;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function guildsMemberInfo($guild_id,$user_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Member_Info,[$guild_id,$user_id]));
    }
}