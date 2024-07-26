<?php

namespace Qin\Qqbot\App\Guilds\Permission;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function list($guild_id)
    {
        return $this->httpGet(vsprintf(Url::Guilds_Bot_Permission,[$guild_id]));
    }

    public function demand($data)
    {
        return $this->httpPost(vsprintf(Url::Guilds_Bot_Permission_Demand,[$data['guild_id']]),[
            'channel_id'=>$data['channel_id'],
            'api_identify'=>$data['api_identify'],
            'desc'=>$data['desc']
        ]);
    }
}