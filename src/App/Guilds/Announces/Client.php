<?php

namespace Qin\Qqbot\App\Guilds\Announces;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function create($data)
    {
        $save = [];
        if (isset($data['message_id'])){
            $save['message_id'] = $data['message_id'];
        }
        if (isset($data['channel_id'])){
            $save['channel_id'] = $data['channel_id'];
        }
        if (isset($data['announces_type'])){
            $save['announces_type'] = $data['announces_type'];
        }
        if (isset($data['recommend_channels'])){
            $save['recommend_channels'] = $data['recommend_channels'];
        }
        return $this->httpPost(vsprintf(Url::Announces_Create,[$data['guild_id']]),$save);
    }


    public function delete($guild_id,$message_id)
    {
        return $this->httpMore(vsprintf(Url::Announces_Delete,[
            $guild_id,$message_id
        ]),[],'DELETE');
    }
}