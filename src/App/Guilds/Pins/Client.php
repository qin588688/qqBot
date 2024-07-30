<?php

namespace Qin\Qqbot\App\Guilds\Pins;

use Qin\Qqbot\Base\BaseClient;
use Qin\Qqbot\Uri\Url;

class Client extends BaseClient
{

    public function list($channel_id)
    {
        return $this->httpGet(vsprintf(Url::Channels_Pins_List,[$channel_id]));
    }

    public function create($channel_id,$message_id)
    {
        return $this->httpMore(vsprintf(Url::Channels_Pins,[
            $channel_id,$message_id
        ]),[],'PUT');
    }


    public function delete($channel_id,$message_id)
    {
        return $this->httpMore(vsprintf(Url::Channels_Pins,[
            $channel_id,$message_id
        ]),[],'DELETE');
    }
}